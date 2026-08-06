<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'supplier_id',
        'name',
        'sku',
        'barcode',
        'purchase_price',
        'selling_price',
        'quantity',
        'unit',
        'image',
        'description',
        'status',
    ];

    /**
     * Product belongs to Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Product belongs to Supplier
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
