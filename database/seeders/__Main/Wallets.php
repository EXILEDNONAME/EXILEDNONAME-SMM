<?php

namespace Database\Seeders\__Main;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Backend\__Main\Wallet;

class Wallets extends Seeder {
  public function run() {
    $data = [
      [

        'id_user'              => '1',
        'balance'             => '0',
        'created_at'        => Carbon::now(),
      ],
    ];

    Wallet::insert($data);
  }
}
