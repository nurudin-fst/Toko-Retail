<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'barcode' => $this->faker->unixTime(),
            'namaBarang' => $this->faker->sentence(3),
            'slug' => $this->faker->slug(3),
            'kdSatuan' => $this->faker->numberBetween(1, 2),
            'kdKategori' => $this->faker->numberBetween(1, 9),
            'hrgBeli' => $this->faker->randomNumber(5, true),
            'hrgJual' => $this->faker->randomNumber(5, true),
            'stok' => $this->faker->numberBetween(1, 20),
            'stok_gudang' => $this->faker->numberBetween(1, 20),
            'deskripsi' => $this->faker->paragraph(),
            'cloud_img' => $this->faker->imageUrl(360, 360, 'product', true, null, false, 'jpeg'),
            'img_urls' => $this->faker->imageUrl(360, 360, 'product', true, null, false, 'jpeg')
        ];
    }
}
