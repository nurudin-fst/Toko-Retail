<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
  use HasFactory;
  protected $table = 'datapelanggan';
  protected $primaryKey = 'kdPelanggan';
  protected $keyType = 'string';
  protected $guarded = [''];
  public $timestamps = false;
}
