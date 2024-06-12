<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // ->orderBy('title')

    public function home(){

        return view('welcome')
        ->with(['posts' => Post::query()->simplePaginate(20)]);
    }


    public function search(Request $request)
    {

       // $posts = Post::query()->where('title','Like','%'.$request->search.'%')->simplePaginate(20);
        return  Post::query()->where('title','Like','%'.$request->search.'%')->toSql();
        return view('search.result',[ 'posts' => $posts ]);
    }

    public function fullSearch(Request $request)
    {


        $posts = DB::table('posts')->whereFullText('description',$request->search)->simplePaginate();

        return view('search.result',['posts' => $posts]);
    }
}
