<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // ->orderBy('title')
    //  return  Post::query()->where('title','Like','%'.$request->search.'%')->toSql();

    // $posts = Post::query()->where('title','Like','%'.$request->search.'%')
    // ->orWhere('description','LIKE','%'.$request->search.'%')
    // ->simplePaginate(20);

    public function home()
    {

        return view('welcome')
            ->with(['posts' => Post::query()->simplePaginate(20)]);
    }


    public function search(Request $request)
    {

        //// find searchable term exists in all title string   ////
        //// index not working on this pattern '%'.$request->search.'%'
        $posts = Post::query()->where('title','Like','%'.$request->search.'%')
        ->orWhere('description','LIKE','%'.$request->search.'%')
        ->simplePaginate(20);

        //// start with searchable term ////
        //// index working
        // $posts = Post::query()->where('title','Like',$request->search.'%')
        // ->orWhere('description','LIKE',$request->search.'%')
        // ->simplePaginate(20);


        ////  end with searchable term ////
        //// index not working
        // $posts = Post::query()->where('title', 'Like', '%' . $request->search)
        //     ->orWhere('description', 'LIKE', '%' . $request->search)
        //     ->simplePaginate(20);



        return view('search.result', ['posts' => $posts]);
    }

    public function fullSearch(Request $request)
    {


        $posts = DB::table('posts')->whereFullText('body', $request->search)->simplePaginate();

        return view('search.result', ['posts' => $posts]);
    }
}
