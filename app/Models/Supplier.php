<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
  use HasFactory;

  use SoftDeletes;

    protected $fillable = [
        'company_name',
        'supplier_name',
        'mobile',
        'email',
        'gst_no',
        'address',
        'city',
        'state',
        'pincode',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
