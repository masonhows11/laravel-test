<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // ->orderBy('title')

    public function home(){

        return view('welcome')
        ->with(['posts' => Post::query()->simplePaginate(20)]);
    }


    public function search(Request $request)
    {




        return view('search.result');
    }
}
