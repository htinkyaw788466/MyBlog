<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\String_;

class AdminPostController extends Controller
{
    protected $limit = 5;
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $user=User::all();
        return view('admin.dashboard',
        ['posts'=>auth()->user()->posts],
        ['categories'=>auth()->user()->categories],
    );
    }

    public function index()
    {

        return view(
            'admin.posts.index',
            [
                'posts' => auth()->user()->posts()->simplePaginate($this->limit)
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create',[
            'categories'=>auth()->user()->categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'required',
            'slug'=>'required',
            'excerpt'=>'required',
            'body'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg'
        ]);

        // Get Form Image
        $image = $request->file('image');
        if (isset($image)) {

            // Make Unique Name for Image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Check PostImg Dir is exists
            if (!Storage::disk('public')->exists('postImg')) {
                Storage::disk('public')->makeDirectory('postImg');
            }

            // Resize Image for post and upload
            $post = Image::make($image)->resize(800,450)->stream();
            Storage::disk('public')->put('postImg/' . $imagename, $post);

        } else {
            $imagename = 'default.png';
        }

       $post=new Post();
       $post->user_id=auth()->user()->id;
       $post->category_id=$request->category_id;
       $post->title=$request->title;
       $post->slug=$request->slug;
       $post->excerpt=$request->excerpt;
       $post->body=$request->body;
       $post->image=$imagename;
       $post->save();
       $notification = array(
           'message' => 'Post Inserted Successfully',
           'alert-type' => 'success'
       );
       return redirect()->route('posts.index')
              ->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post=Post::where('slug',$slug)->first();
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $categories=auth()->user()->categories;
        $post=Post::where('slug',$slug)->first();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        // Get Form Image
        $image = $request->file('image');
        $post=Post::where('slug',$slug)->first();
        if (isset($image)) {

            // Make Unique Name for Image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Check PostImg Dir is exists
            if (!Storage::disk('public')->exists('postImg')) {
                Storage::disk('public')->makeDirectory('postImg');
            }

            // Delete Old Image
            if (Storage::disk('public')->exists('postImg/' . $post->image)) {
                Storage::disk('public')->delete('postImg/' . $post->image);
            }

            // Resize Image for post and upload
            $post = Image::make($image)->resize(800,450)->stream();
            Storage::disk('public')->put('postImg/' . $imagename, $post);

        } else {
            $imagename = $post->image;
        }

       $post=Post::where('slug',$slug)->first();
       $post->user_id=auth()->user()->id;
       $post->category_id=$request->category_id;
       $post->title=$request->title;
       $post->slug=$request->slug;
       $post->excerpt=$request->excerpt;
       $post->body=$request->body;
       $post->image=$imagename;
       $post->save();
       $notification = array(
           'message' => 'Post Updated Successfully',
           'alert-type' => 'info'
       );
       return redirect()->route('posts.index')
              ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $post = Post::where('slug',$slug)->first();

        // Delete Old Image
           if (Storage::disk('public')->exists('postImg/'.$post->image)) {
               Storage::disk('public')->delete('postImg/'.$post->image);
             }

             $post->delete();
             $notification = array(
                 'message' => 'Post Delete Successfully',
                 'alert-type' => 'error'
             );
              return redirect()->route('posts.index')
              ->with($notification);
    }

    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('blog.index')->with('success', 'user logout');
    }

    public function listComment()
    {
        $comments=auth()->user()->comments;
        return view('admin.posts.comment',compact('comments'));
    }

    public function deleteComment(String $id)
    {
        $comment=Comment::findOrFail($id);
        $comment->delete();
        $notification = array(
            'message' => 'Comment Delete Successfully',
            'alert-type' => 'error'
        );
         return redirect()->route('list.comments')
         ->with($notification);
    }
}
