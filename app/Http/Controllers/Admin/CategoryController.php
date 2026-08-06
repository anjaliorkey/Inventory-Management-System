<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

     // Display a listing of the resource.

   public function index(Request $request)
    {
        $query = Category::query();

        // Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Pagination
        $categories = $query->orderBy('id', 'asc')->paginate(10);

        return view('admin.category.index', compact('categories'));
    }


     // Show the form for creating a new resource.

    public function create()
    {
        return view('admin.Category.add');
    }


     // Store a newly created resource in storage.

    public function store(Request $request)
    {
           $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:100|unique:categories,name',
            'status' => 'required|boolean',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'status' => $request->status,
            ]);

            return redirect()
                ->route('admin.Category.index')
                ->with('success', 'Category created successfully.');

    }



     // Show the form for editing the specified resource.

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('admin.Category.edit', compact('category'));
    }


     //Update the specified resource in storage.

    public function update(Request $request, string $id)
    {
         $categories = Category::findOrFail($id);

        $validator = Validator::make($request->all(), [

            'name' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $categories->update([

            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,

        ]);

        return redirect()
            ->route('admin.Category.index')
            ->with('success', 'Category updated successfully.');


    }


      //  Remove the specified resource from storage.

        public function destroy(string $id)
        {
            $category =   Category::findOrFail($id);

            $category->delete();

            return redirect()
                ->route('admin.Category.index')
                ->with('success', 'Category deleted successfully.');
        }
}
