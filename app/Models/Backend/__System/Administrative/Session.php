<?php

namespace App\Models\Backend\__System\Administrative;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model {

  use HasFactory;

  protected $table = 'sessions';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];

}
