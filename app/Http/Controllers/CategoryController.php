<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategorRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategorRequest $request)
    {
        $request->validated();
        $categories              = new Category();
        $categories->name        = $request->name;
        $categories->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName           = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('category'), $imageName);
            $categories->image   =  $imageName;
        }

        $categories->save();
        Session::flash('message', 'Category successfully created!');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function changeActiveStatus($id) {
        $categories   = Category::findOrfail($id);
        $status       = $categories->status;
   
        if ($status=='1') {
            $status = 0;
        }else{
            $status = 1;
        }
        $categories->save();
        Session::flash('message', 'Category Status Change successfully!');
        return redirect()->back();
    }


}
