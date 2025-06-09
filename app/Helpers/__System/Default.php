<?php

use Spatie\Activitylog\Models\Activity;

function activities($model) {
  $data = $activity = Activity::where('subject_type', $model)->orderBy('created_at', 'desc')->get();
  return $data;
}

function chart_created($model) {
  $items = Activity::where('description', 'created')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-01%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'created')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-02%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'created')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-03%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'created')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-04%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'created')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-05%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'created')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-06%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'created')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-07%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'created')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-08%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'created')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-09%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'created')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-10%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'created')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-11%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'created')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-12%')->count();
  return $items;
}

function chart_deleted($model) {
  $items = Activity::where('description', 'deleted')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-01%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'deleted')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-02%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'deleted')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-03%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'deleted')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-04%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'deleted')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-05%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'deleted')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-06%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'deleted')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-07%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'deleted')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-08%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'deleted')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-09%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'deleted')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-10%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'deleted')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-11%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'deleted')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-12%')->count();
  return $items;
}

function chart_updated($model) {
  $items = Activity::where('description', 'updated')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-01%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'updated')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-02%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'updated')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-03%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'updated')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-04%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'updated')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-05%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'updated')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-06%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'updated')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-07%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'updated')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-08%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'updated')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-09%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'updated')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-10%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'updated')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-11%')->count(); $items .= ', ';
  $items .= Activity::where('description', 'updated')->where('subject_type', $model)->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-12%')->count();
  return $items;
}
