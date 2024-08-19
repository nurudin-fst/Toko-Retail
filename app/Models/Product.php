<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $guarded = ['id'];
  protected $with = ['category'];
  protected $fillable = ['name', 'slug', 'barcode', 'buy_price', 'sold_price', 'variant', 'store_stock', 'weight'];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function unit()
  {
    return $this->belongsTo(Unit::class);
  }
}
