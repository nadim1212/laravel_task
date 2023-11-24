<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post_page()
    {
        return view('superadmin.post_page');
    }

 public function add_post(Request $request)
 {
   $user = Auth()->user();
   $userid = $user->id;
   $name = $user->name;
   $usertype = $user->usertype;
   $post = new Post;
   $post->title = $request->title;
   $post->description = $request->description;
   $post->post_status = 'active';
   $post->user_id = $userid;
   $post->name = $name;
   $post->usertype = $usertype;

   $post->save();
   return redirect()->back()->with('message','Post Added Successfully');
 }

}
