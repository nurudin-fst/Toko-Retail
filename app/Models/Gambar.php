<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
  use HasFactory;
  protected $guarded = ['kdGambar'];
  protected $table = 'gambar';
  protected $primaryKey = 'kdGambar';

  public function barang()
  {
    return $this->belongsTo(Barang::class, 'barcode');
  }
}
