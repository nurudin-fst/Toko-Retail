<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
  use HasFactory;
  protected $table = 'tabel_penjualan';
  protected $guarded = ['No'];
  protected $primaryKey = 'No';
  // protected $with = ['tabelrealpenjualan', 'order'];
  public $timestamps = false;

  public function realjual()
  {
    return $this->belongsTo(Kasir::class, 'noFakturJualan');
  }

  public function order()
  {
    return $this->hasOne(Order::class, 'noFaktur');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'kdPelanggan');
  }
}
