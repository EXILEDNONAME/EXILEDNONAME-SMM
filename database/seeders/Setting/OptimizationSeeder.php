<?php

namespace Database\Seeders\Setting;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Backend\__System\Administrative\Application\Optimization;

class OptimizationSeeder extends Seeder {

  public function run() {
    $data = [
      [
        "name"          => "Optimize Clear",
        "description"   => "\Artisan::call('optimize:clear')",
        "created_at"    => Carbon::now(),
      ],
      [
        "name"          => "Dump-Autoload",
        "description"   => "system('composer dump-autoload')",
        "created_at"    => Carbon::now(),
      ],
    ];

    Optimization::insert($data);
  }

}
