<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      "namaUser" => "Admin",
      "password" => Hash::make("SMart@2022"),
      "email" => "smegamart@smega.sch.id",
      "level" => "Admin",
    ]);

    User::create([
      "namaUser" => "Kasir",
      "password" => Hash::make("KSM@2022"),
      "email" => "ksm@smega.sch.id",
      "level" => "Kasir",
    ]);

    $this->call([
      BarangSeeder::class
    ]);
  }
}
