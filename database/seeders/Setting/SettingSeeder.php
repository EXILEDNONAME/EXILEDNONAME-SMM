<?php

namespace Database\Seeders\Setting;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Backend\__System\Administrative\Application\Setting;

class SettingSeeder extends Seeder {

  public function run() {
    $data = [
      [
        'application_name'            => 'EXILEDNONAME',
        'application_version'         => '1.0',
        'created_at'                  => Carbon::now(),
      ],
    ];

    Setting::insert($data);
  }

}
