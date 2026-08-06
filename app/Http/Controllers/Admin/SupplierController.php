<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SupplierController extends Controller
{

      // Display a listing of the resource.

    public function index(Request $request)
    {
        $suppliers = Supplier::query()

            ->when($request->search, function ($query) use ($request) {

                $query->where('company_name', 'like', '%' . $request->search . '%')
                    ->orWhere('supplier_name', 'like', '%' . $request->search . '%')
                    ->orWhere('mobile', 'like', '%' . $request->search . '%');

            })

            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('admin.supplier.index', compact('suppliers'));
    }


     // Show the form for creating a new resource.

    public function create()
    {
         return view('admin.supplier.add');
    }


      //Store a newly created resource in storage.

    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [

            'company_name'  => 'required|string|max:255',
            'supplier_name' => 'required|string|max:255',
            'mobile'        => 'required|digits:10|unique:suppliers,mobile',
            'email'         => 'required|email|max:255',
            'gst_no'        => 'nullable|string|max:20',
            'address'       => 'required|string',
            'city'          => 'required|string|max:100',
            'state'         => 'required|string|max:100',
            'pincode'       => 'required|digits:6',
            'status'        => 'required|boolean',

            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            Supplier::create([
                'company_name'  => $request->company_name,
                'supplier_name' => $request->supplier_name,
                'mobile'        => $request->mobile,
                'email'        => $request->email,
                'gst_no'        => $request->gst_no,
                'address'        => $request->address,
                'city'        => $request->city,
                'state'        => $request->state,
                'pincode'        => $request->pincode,
                'status' => $request->status,
            ]);

            return redirect()
                ->route('admin.supplier.index')
                ->with('success', 'Supplier created successfully.');
    }


      // Display the specified resource.

    public function show(string $id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('admin.supplier.view', compact('supplier'));
    }


     // Show the form for editing the specified resource.

    public function edit(string $id)
    {
         $suppliers = Supplier::findOrFail($id);

         return view('admin.supplier.edit', compact('suppliers'));
    }


     // Update the specified resource in storage.

    public function update(Request $request, $id)
    {
        $suppliers = Supplier::findOrFail($id);

        $validator = Validator::make($request->all(), [

            'company_name'  => 'nullable|string|max:255',
            'supplier_name' => 'nullable|string|max:255',
            'mobile'        => 'nullable|digits:10|unique:suppliers,mobile,' . $id,
            'email'         => 'nullable|email|max:255',
            'gst_no'        => 'nullable|string|max:20',
            'address'       => 'nullable|string',
            'city'          => 'nullable|string|max:100',
            'state'         => 'nullable|string|max:100',
            'pincode'       => 'nullable|digits:6',
            'status'        => 'nullable|boolean',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $data = $request->only([
            'company_name',
            'supplier_name',
            'mobile',
            'email',
            'gst_no',
            'address',
            'city',
            'state',
            'pincode',
            'status'
        ]);



        $suppliers->update(array_filter($data));


        return redirect()
            ->route('admin.supplier.index')
            ->with('success', 'Supplier updated successfully.');
    }


     // Remove the specified resource from storage.

    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return redirect()
            ->route('admin.supplier.index')
            ->with('success', 'Supplier deleted successfully.');
    }

    public function trash()
    {
        $suppliers = Supplier::onlyTrashed()
            ->orderBy('deleted_at', 'desc')
            ->paginate(10);


        return view(
            'admin.supplier.trash',
            compact('suppliers')
        );
    }



 // Restore deleted supplier

    public function restore($id)
    {
        $supplier = Supplier::withTrashed()->findOrFail($id);

        if (!$supplier->trashed()) {
            return redirect()
                ->back()
                ->with('error', 'Supplier is already active.');
        }

        $supplier->restore();

        return redirect()
            ->route('admin.supplier.index')
            ->with('success', 'Supplier restored successfully.');
    }


 // Permanent delete

   public function forceDelete($id)
    {
        $supplier = Supplier::withTrashed()->findOrFail($id);

        if (!$supplier->trashed()) {
            return redirect()
                ->back()
                ->with('error', 'Only deleted suppliers can be permanently deleted.');
        }

        $supplier->forceDelete();

        return redirect()
            ->route('admin.supplier.trash')
            ->with('success', 'Supplier permanently deleted.');
    }

}
