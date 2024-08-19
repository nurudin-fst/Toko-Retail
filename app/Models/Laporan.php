<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
  use HasFactory;
  protected $table = 'tabel_penjualan';
  protected $primaryKey = 'No';
  protected $guarded = ['No'];
}
