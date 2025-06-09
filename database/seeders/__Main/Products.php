<?php

namespace Database\Seeders\__Main;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Backend\__Main\Product;

class Products extends Seeder {
  public function run() {
    $data = [
      [
        'id_service'        => '7260',
        'name'              => 'FREE - Tiktok View',
        'price'             => '0',
        'created_at'        => Carbon::now(),
      ],
      [
        'id_service'        => '6952',
        'name'              => 'PREMIUM - Tiktok View',
        'price'             => '1',
        'created_at'        => Carbon::now(),
      ],
      [
        'id_service'        => '5019',
        'name'              => 'PREMIUM - Tiktok Likes',
        'price'             => '5',
        'created_at'        => Carbon::now(),
      ],
    ];

    Product::insert($data);
  }
}
