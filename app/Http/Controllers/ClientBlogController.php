<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ClientBlogController extends Controller
{
    protected $limit=5;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::with('posts')->orderBy('name','asc')->get();

        $posts=Post::latest()->filter(request(['excerpt','search']))->
              simplePaginate($this->limit);
        return view('client.blog.index',compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $categories=Category::with('posts')
                    ->orderBy('name','asc')->get();
        $post=Post::where('slug',$slug)->first();
        return view('client.blog.show',compact('categories','post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function category(Category $category)
    {
        $categoryName=$category->name;

        $posts=$category->posts()->with('user')
               ->simplePaginate($this->limit);
        return view('client.blog.index',compact('posts','categoryName'));
    }


    public function author(User $author)
    {
        // dd($author->email);
        $authorName=$author->name;

        $posts=$author->posts()->with('category')
               ->simplePaginate($this->limit);
        return view('client.blog.index',compact('posts','authorName'));
    }

    public function commentStore(Request $request)
    {
        $this->validate($request,[
            'content'=>'required'
        ]);

        $comment=new Comment();
        $comment->content=$request->content;
        $comment->user_id=auth()->user()->id;
        $comment->post_id=$request->post_id;
        $comment->email=$request->email;
        $comment->website_url=$request->website_url;
        $comment->save();
        $notification = array(
            'message' => 'comment add',
            'alert-type' => 'success'
        );
        return redirect()->back()
               ->with($notification);
    }

}
