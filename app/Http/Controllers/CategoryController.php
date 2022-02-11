<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryUpdateValidator;
use App\Http\Requests\CategoryValidator;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>[]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return view('category.list',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryValidator $request)
    {
        $category = new Category();
        $category->name= $request->get('name');
        $category->desc = $request->get('description');
        $originalName = explode($request->file('photo')->getClientOriginalExtension(),$request->file('photo')->getClientOriginalName())[0];
        $category->save();
        $nameFile = $category->id . $originalName  .  $request->file('photo')->getClientOriginalExtension();
        $category->image = $request->file('photo')->move('images',$nameFile );
        $category->save();
        return redirect(route('category.index'));
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
        $category = Category::findOrFail($id);
        return view('category.form',compact('category'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateValidator $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name= $request->get('name');
        $category->desc = $request->get('description');

        if ($request->file('photo')){
            $nameFile = str_replace('images/', '', $category->image);
            $category->image = $request->file('photo')->move('images', $nameFile);
        }
        $category->save();
        return redirect(route('category.index'));
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
}
