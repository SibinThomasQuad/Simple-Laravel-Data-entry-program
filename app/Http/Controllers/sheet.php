<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class sheet extends Controller
{
    //
    function index(Request $request)
    {
       $data=DB::table('sheet')->where('id',$request->table)->first();
       return view('sheet',array('data'=>$data));
    }
    function live(Request $request)
    {
      $location=$request->location;
      $content=$request->content;
      $id=$request->id;
      $data=DB::table('sheet')->where('id',$id)->first();
      $array=json_decode($data->data);
      $array->$location=$content;
      $json=json_encode($array);
      DB::table('sheet')
              ->where('id', $id)
              ->update(['data' => $json]);
    }
    function add(Request $request)
    {
      $dataz=DB::table('sheet')->where('id',$request->id)->first();
      if($request->curve==0)
      {
        DB::table('sheet')
                ->where('id', $request->id)
                ->update(['row' => $dataz->row+1]);
      }
      else {
        DB::table('sheet')
                ->where('id', $request->id)
                ->update(['col' => $dataz->col+1]);
      }
      return 'Success';
    }
    function list()
    {
      $data=DB::table('sheet')->get();
      return view('list',array('data'=>$data));
    }
    function create(Request $request)
    {
      DB::table('sheet')->insert([
  'sheet_name' => $request->tname,
  'row' => $request->row,
  'col'=>$request->col,
  'data'=>'{}'
]);
$id = DB::getPdo()->lastInsertId();
return redirect('/sheet?table='.$id);
    }
    function get_count(Request $request)
    {
      $count = DB::table('sheet')->where('id',$request->id)->first();
      if($request->curve==0)
      {
          return $count->col;
      }
      else
      {
          return $count->row;
      }
    }
}
