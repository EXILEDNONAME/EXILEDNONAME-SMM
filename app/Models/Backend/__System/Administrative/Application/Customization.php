<?php

namespace App\Models\Backend\__System\Administrative\Application;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customization extends Model {

  use HasFactory;

  protected $table = 'system_customizations';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];

}
