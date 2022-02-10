<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\ReportArticle;
use App\Models\Valoration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class apiArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category_id = $request->input('category_id');
        $name = $request->input('name');
        $article = Article::when($category_id,function($query,$category_id) {
            return $query->where('category_id',$category_id);
        })->when($name,function($query,$name) {
            return $query->where('name',$name);
        })->paginate(9);
        return response()->json($article,200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->propriety_id = Auth::user();
        $article->category_id = $request->category_id;
        $article->description = $request->description;
        $article->price = $request->price;
        $article->location = $request->location;
        $article->save();
        return response()->json($article,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article = new  ArticleResource($article);
        return response()->json($article,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->category_id = $request->category_id;
        $article->description = $request->description;
        $article->price = $request->price;
        $article->location = $request->location;
        $article->save();
        return response()->json($article,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->tags()->detach();
        $article->delete();
    }
}
