<?php

namespace App\Models\Backend\__System\Application\Datatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Relation extends Model {

  use HasFactory, LogsActivity, SoftDeletes;

  protected $table = 'system_application_table_relations';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];
  protected static $logAttributes = ['*'];
  protected static $recordEvents = ['created', 'deleted', 'updated'];

  public function getActivitylogOptions(): LogOptions {
    return LogOptions::defaults()->logOnly(['*']);
  }

  public function datatable_generals(){
    return $this->belongsTo(General::class, 'id_general');
  }

}
