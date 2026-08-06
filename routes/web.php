<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckUser;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {


    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return view('welcome');

    return view('admin.dashboard');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware([CheckAdmin::class])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');



    //Categories
    Route::get('/category', [CategoryController::class, 'index'  ])->name('admin.Category.index');
    Route::get('/show-category', [CategoryController::class, 'create'  ])->name('admin.Category.show');
    Route::post('/add-category', [CategoryController::class, 'store'  ])->name('admin.Category.add');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'  ])->name('admin.Category.edit');
    Route::put('/update-category/{id}', [CategoryController::class, 'update'  ])->name('admin.Category.update');
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'  ])->name('admin.Category.delete');

    //Supplier
    Route::get('/supplier', [SupplierController::class, 'index'  ])->name('admin.supplier.index');
    Route::get('/Show-supplier', [SupplierController::class, 'create'  ])->name('admin.supplier.show');
    Route::post('/add-supplier', [SupplierController::class, 'store'  ])->name('admin.supplier.add');
    Route::get('/edit-supplier/{id}', [SupplierController::class, 'edit'  ])->name('admin.supplier.edit');
    Route::put('/update-supplier/{id}', [SupplierController::class, 'update'  ])->name('admin.supplier.update');
    Route::get('/details-supplier/{id}', [SupplierController::class, 'show'  ])->name('admin.supplier.view');
    Route::get('/delete-supplier/{id}', [SupplierController::class, 'destroy'  ])->name('admin.supplier.delete');
    Route::get('/supplier-trash', [SupplierController::class, 'trash'])->name('admin.supplier.trash');
    Route::post('/supplier-restore/{id}', [SupplierController::class, 'restore'])->name('admin.supplier.restore');
    Route::delete('/supplier-force-delete/{id}', [SupplierController::class, 'forceDelete'])->name('admin.supplier.forceDelete');



    //Products
    Route::get('/products', [ProductController::class, 'index'  ])->name('admin.product.index');
    Route::get('/create-products', [ProductController::class, 'create'  ])->name('admin.product.show');
    Route::post('/add-products', [ProductController::class, 'store'  ])->name('admin.product.add');
    Route::get('/edit-products/{id}', [ProductController::class, 'edit'  ])->name('admin.product.edit');
    Route::get('/details-products/{id}', [ProductController::class, 'show'  ])->name('admin.product.view');
    Route::put('/update-products/{id}', [ProductController::class, 'update'  ])->name('admin.product.update');
    Route::get('/delete-products/{id}', [ProductController::class, 'destroy'  ])->name('admin.product.delete');
    Route::get('/products-trash', [ProductController::class, 'trash'])->name('admin.product.trash');
    Route::post('/products-restore/{id}', [ProductController::class, 'restore'])->name('admin.product.restore');
    Route::delete('/products-force-delete/{id}', [ProductController::class, 'forceDelete'])->name('admin.product.forceDelete');


});


Route::middleware([CheckUser::class])->group(function () {

        Route::get('/staff/dashboard', [StaffController::class, 'index'])->name('staff.dashboard');

});



