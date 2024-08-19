<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
  use HasFactory;

  protected $table = 'tabelsatuan';
  protected $primaryKey = 'kdSatuan';
  protected $guarded = ['kdSatuan'];
  public $timestamps = false;

  public function product()
  {
    return $this->hasOne(Barang::class, 'kdSatuan');
  }
}
