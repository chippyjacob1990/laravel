<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function list() {
    $posts = DB::select('select * from posts order by created_at');
    return view('posts.list', compact('posts'));
  }
  public function create() {

  }
}
