<?php

namespace Database\Seeders\__System\Dummy;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Backend\__System\Administrative\Application\Customization;
use App\Models\Backend\__System\Application\Datatable\General;

class DatatableGenerals extends Seeder {
  public function run() {
    $data = [
      [
        'name'              => 'Table General - 1',
        'created_at'        => Carbon::now(),
      ],
      [
        'name'              => 'Table General - 2',
        'created_at'        => Carbon::now(),
      ],
      [
        'name'              => 'Table General - 3',
        'created_at'        => Carbon::now(),
      ],
    ];

    General::insert($data);
  }
}
