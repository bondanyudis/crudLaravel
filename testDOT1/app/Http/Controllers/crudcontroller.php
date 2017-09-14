<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\crud;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class crudcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index(){
      // we need to show all data from "blog" table
      $blogs = crud::all();
      // show data to our view
      return view('blog.index',['blogs' => $blogs]);
    }

      // edit data function
      public function editItem(Request $req) {
      $blog = crud::find ($req->id);
      $blog->nama = $req->nama;
      $blog->alamat = $req->alamat;
      $blog->telepon = $req->telepon;
      $blog->save();
      // return response()->json($blog);
      return response()->json($blog,200);
    }

    // add data into database
    public function addItem(Request $req) {

      $rules = array(
        'nama' => 'required',
        'alamat' => 'required',
        'telepon' => 'required'
      );
      // for Validator
      $validator = Validator::make ( Input::all (), $rules );
      if ($validator->fails())
      return Response::json(array('errors' => $validator->getMessageBag()->toArray()));

      else {
        $crud = new crud();
        $crud->nama = $req->nama;
        $crud->alamat = $req->alamat;
        $crud->telepon = $req->telepon;
        $crud->save();
        // return response()->json($crud);
        return response()->json($crud,200);
      }
    }
    // delete item
    public function deleteItem(Request $req) {
      crud::find($req->id)->delete();
      // return response()->json();
      return response()->json("success",200);
    }
}
