<?php

namespace App\Http\Controllers\Admin;


use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

      //Display a listing of the resource.

    public function index(Request $request)
    {

       $products = Product::with(['category', 'supplier'])
        ->when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('sku', 'like', '%' . $request->search . '%');
        })
        ->orderBy('id', 'asc')
        ->paginate(10);

    return view('admin.product.index', compact('products'));
    }


     // Show the form for creating a new resource.

    public function create()
    {
        $categories = Category::where('status', '1')->get();

        $suppliers  = Supplier::where('status', '1')->get();
        return view('admin.product.add', compact('categories' , 'suppliers'));
    }


      //Store a newly created resource in storage.

    public function store(Request $request)
    {
          $validator = Validator::make($request->all(), [

            'category_id'    => 'required|exists:categories,id',
            'supplier_id'    => 'required|exists:suppliers,id',
            'name'           => 'required|string|max:255',
            'sku'            => 'required|string|max:100|unique:products,sku',
            'barcode'        => 'nullable|string|max:100|unique:products,barcode',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price'  => 'required|numeric|min:0',
            'quantity'       => 'required|integer|min:0',
            'unit'           => 'required|string|max:50',
            'description'    => 'nullable|string',
            'status'         => 'required|boolean',
          ]);

          if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            Product::create([
                'category_id'     => $request->category_id,
                'supplier_id'     => $request->supplier_id,
                'name'            => $request->name,
                'sku'             => $request->sku,
                'barcode'         => $request->barcode,
                'purchase_price'  => $request->purchase_price,
                'selling_price'   => $request->selling_price,
                'quantity'        => $request->quantity,
                'unit'            => $request->unit,
                'description'     => $request->description,
                'status'          => $request->status,

            ]);

            return redirect()->route('admin.product.index')->with('success', 'Product created successfully');
    }


     // Display the specified resource.

       public function show($id)
        {
            $product = Product::with(['category', 'supplier'])->findOrFail($id);

            return view('admin.product.view', compact('product'));
        }


      //Show the form for editing the specified resource.

       public function edit($id)
        {
            $product = Product::findOrFail($id);
            $categories = Category::where('status', 1)->get();
            $suppliers  = Supplier::where('status', 1)->get();

            return view('admin.product.edit', compact( 'product',  'categories',  'suppliers'  ));
        }


     // Update the specified resource in storage.
       public function update(Request $request, $id)
        {
            $product = Product::findOrFail($id);

            $validator = Validator::make($request->all(), [

                'category_id'    => 'required|exists:categories,id',
                'supplier_id'    => 'required|exists:suppliers,id',
                'name'           => 'required|string|max:255',
                'sku'            => 'required|string|max:100|unique:products,sku,' . $product->id,
                'barcode'        => 'nullable|string|max:100|unique:products,barcode,' . $product->id,
                'purchase_price' => 'required|numeric|min:0',
                'selling_price'  => 'required|numeric|min:0',
                'quantity'       => 'required|integer|min:0',
                'unit'           => 'required|string|max:50',
                'description'    => 'nullable|string',
                'status'         => 'required|boolean',

            ]);


            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }


            $product->update([

                'category_id'     => $request->category_id,
                'supplier_id'     => $request->supplier_id,
                'name'            => $request->name,
                'sku'             => $request->sku,
                'barcode'         => $request->barcode,
                'purchase_price'  => $request->purchase_price,
                'selling_price'   => $request->selling_price,
                'quantity'        => $request->quantity,
                'unit'            => $request->unit,
                'description'     => $request->description,
                'status'          => $request->status,

            ]);


            return redirect()
                ->route('admin.product.index')
                ->with('success', 'Product updated successfully');
        }





     // Remove the specified resource from storage.

    public function destroy( $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

         return redirect()
            ->route('admin.product.index')
            ->with('success', 'product deleted successfully.');
    }

    public function trash()
    {
        $products = Product::onlyTrashed()
        ->orderby('deleted_at', 'desc')
        ->paginate(10);

        return view('admin.product.trash', compact('products'));
    }

    public function restore($id)
    {
        $products = Product::withTrashed()->findOrFail($id);

        if (!$products->trashed())
            {
                 return redirect()
                ->back()
                ->with('error', 'Supplier is already active.');
            }
        $products->restore();

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Supplier restored successfully.');
    }

    public function forceDelete($id)
    {
        $products = Product::withTrashed()->findOrFail($id);

        if (!$products->trashed())
        {
                return redirect()
            ->back()
            ->with('error', 'Supplier is already active.');
        }
          $products->forceDelete();

          return redirect()
                  ->route('admin.product.trash')
                  ->with('success', 'Product permanently deleted.');

    }
}
