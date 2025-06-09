<?php

function DatatableGenerals() {
  $items = DB::table('system_application_table_generals')->orderBy('created_at','asc')->where('active', 1)->pluck('name', 'id')->toArray();
  return $items;
}

function filter_DatatableGenerals() {
  $items = DB::table('system_application_table_generals')->orderBy('name','asc')->pluck('name', 'name')->toArray();
  return $items;
}
