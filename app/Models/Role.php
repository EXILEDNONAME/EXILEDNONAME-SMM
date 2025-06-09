<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model {

  use HasFactory, LogsActivity, SoftDeletes;

  protected $table = 'roles';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];
  protected static $logAttributes = ['*'];
  protected static $recordEvents = ['created', 'deleted', 'updated'];

  public function getActivitylogOptions(): LogOptions {
    return LogOptions::defaults()->logOnly(['*']);
  }

}
