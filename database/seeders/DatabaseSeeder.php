<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  */
  public function run(): void
  {
    $this->call(__System\Dummy\DatatableGenerals::class);

    $this->call(Setting\CustomizationSeeder::class);
    $this->call(Setting\OptimizationSeeder::class);
    $this->call(Setting\SettingSeeder::class);

    $this->call(Access\RoleSeeder::class);
    $this->call(Access\UserSeeder::class);
  }
}
