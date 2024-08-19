<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
  use HasFactory;
  protected $table = 'tabelpembelian';
  protected $guarded = ['No'];
  protected $primaryKey = 'No';
  public $timestamps = false;
}
