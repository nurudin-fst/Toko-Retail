<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $table = 'datauser';
  protected $primaryKey = 'kdUser';
  public $timestamps = false;

  public function barang()
  {
    return $this->belongsTo(Barang::class, 'barcode');
  }

  public function order()
  {
    return $this->belongsTo(Order::class, 'barcode');
  }

  public function rinciorder()
  {
    return $this->hasOne(RinciOrder::class, 'kdUser');
  }

  public function penjualan()
  {
    return $this->belongsTo(Penjualan::class, 'Kd_Pelanggan');
  }


  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $guarded = ['kdUser'];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
  ];

  protected $attributes = [
    'level' => "Customer",
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  // protected $casts = [
  //     'email_verified_at' => 'datetime',
  // ];
}
