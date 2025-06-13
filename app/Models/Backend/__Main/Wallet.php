<?php

namespace App\Models\Backend\__Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\User;

class Wallet extends Model {

  use HasFactory, LogsActivity, SoftDeletes;

  protected $table = 'main_wallets';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];
  protected static $logAttributes = ['*'];
  protected static $recordEvents = ['created', 'deleted', 'updated'];

  public function getActivitylogOptions(): LogOptions {
    return LogOptions::defaults()->logOnly(['*']);
  }

  public function id_users(){
    return $this->belongsTo(User::class, 'id_user');
  }

}
