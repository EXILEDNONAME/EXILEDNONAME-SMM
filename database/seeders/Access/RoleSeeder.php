<?php

namespace Database\Seeders\Access;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder {

  public function run(): void {
    $roles = [
      'master-administrator',
      'administrator'
    ];

    foreach ($roles as $role) {
      Role::create(['name' => $role]);
    }
  }

}
