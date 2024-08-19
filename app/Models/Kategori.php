<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
  use HasFactory;

  protected $table = 'tabelkategori';
  protected $primaryKey = 'kdKategori';
  protected $guarded = ['kdKategori'];
  public $timestamps = false;

  public function barang()
  {
    return $this->hasMany(Barang::class, 'kdKategori');
    // return $this->hasOne(Barang::class, 'barcode');
  }
}
