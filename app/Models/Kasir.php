<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
  use HasFactory;
  protected $table = 'tabelrealpenjualan';
  protected $guarded = ['no'];
  public $timestamps = false;
  // protected $with = ['penjualan'];

  public function barang()
  {
    return $this->hasOne(Barang::class, 'barcode');
  }

  public function penjualan()
  {
    return $this->hasOne(Penjualan::class, 'No_Faktur_Jual');
  }
}
