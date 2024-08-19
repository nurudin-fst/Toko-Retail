<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
  use HasFactory;

  protected $table = 'datasupplier';
  protected $primaryKey = 'kdSupplier';
  protected $guarded = [];
  public $timestamps = false;

  public function barang()
  {
    return $this->belongsTo(Barang::class, 'kdSupplier');
  }

  public function storagepembelian()
  {
    return $this->hasOne(Storagepembelian::class, 'kdSuplier');
  }
}
