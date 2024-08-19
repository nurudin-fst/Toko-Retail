<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storagepembelian extends Model
{
  use HasFactory;
  protected $table = 'tabelpembelian';
  protected $guarded = ['No'];
  protected $primaryKey = 'No';
  public $timestamps = false;

  public function suplier()
  {
    return $this->belongsTo(Suplier::class, 'kdSupplier');
  }
}
