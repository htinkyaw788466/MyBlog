<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index',[
            'categories'=>auth()->user()->categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'slug'=>'required'
        ]);

        $category=new Category();
        $category->user_id=auth()->user()->id;
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->save();
        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('category.index')
               ->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $category=Category::where('slug',$slug)->first();
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $category=Category::where('slug',$slug)->first();
        $category->user_id=auth()->user()->id;
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->save();
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('category.index')
               ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $category=Category::where('slug',$slug)->first();
        $category->delete();
        $notification = array(
            'message' => 'Category Delete Successfully',
            'alert-type' => 'error'
        );
         return redirect()->route('category.index')
         ->with($notification);
    }
}
