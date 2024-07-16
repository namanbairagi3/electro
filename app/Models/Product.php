<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
                            'product_name',
                            'product_desc',
                            'brand_id',
                            'unit_id',
                            'category_id',
                            'mrp',
                            'sell_price',
                            'qty_available',
                            'prod_thumbnail_img',
                            'prod_main_img'
                          ];
}
