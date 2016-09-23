<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PagesController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return View('pages.welcome')->withPosts($posts);
    }

    public function getAbout()
    {
      $first = "Cleverson";
      $last = "Santos Dias";
      $fullname = $first . " " . $last;
      $email = "cleverson.s.dias@gmail.com";
      $data = [
      'fullname' => $fullname ,
      'email' => $email,
      ];
      return View('pages.about')->withData($data);
    }

    public function getContact()
    {
      return View('pages.contact');;
    }

}
