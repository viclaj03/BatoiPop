<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Mail\MailBuyArticle;
use App\Mail\MailNewArticle;
use App\Models\Article;
use App\Models\Photo;
use App\Models\ReportArticle;
use App\Models\Valoration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class apiArticleController extends apiController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category_id = $request->input('category_id')??null;
        $name = $request->input('name')??null;
        $price1 = $request->input('price1')??null;
        $price2 = $request->input('price2')??null;
        $price = [];
        if ($price1 && $price2) {
            $price = [$price1, $price2];
        }
        $latitud = $request->input('latitud');
        $logitud = $request->input('longitud');
        $distancia = $request->input('distancia');
        $parametrosDistancia = [];
        if ($latitud && $logitud && $distancia) {
            $parametrosDistancia = [$latitud, $logitud, $distancia];
        }
        $tag_id = $request->input('tag_id');
        $article = Article::when($category_id,function($query,$category_id) {
            return $query->where('category_id',$category_id);
        })->when($name,function($query,$name) {
            return $query->where('name','LIKE','%'.$name.'%');
        })->when($price,function($query,$price) {
            return $query->whereBetween('price',[$price[0],$price[1]]);
        })->when($tag_id,function($query,$tag_id) {
            $articles_id = DB::table('tag_article')->select('article_id')->where('tag_id',$tag_id);
            return $query->whereIn('id',$articles_id);
        })->when($parametrosDistancia,function($query,$parametrosDistancia) {
            return $query->selectRaw("*,
            ( 6371 * acos( cos( radians(" . $parametrosDistancia[0] . ") ) *
            cos( radians(latitud) ) *
            cos( radians(longitud) - radians(" . $parametrosDistancia[1] . ") ) +
            sin( radians(" . $parametrosDistancia[0] . ") ) *
            sin( radians(latitud) ) ) )
            AS distance")->having("distance", "<", $parametrosDistancia[2]);
        })->doesntHave('reports')->orWhereHas('reports',function($q){
            $q->where('accepted', false)->orWhere('accepted', null);
        })->paginate(9);
        return $this->success($article);
    }

    public function articleByUser(Request $request){
        $owner_id = $request->input('id')??null;
        $article = Article::when($owner_id,function($query,$owner_id) {
            return $query->where('owner_id', $owner_id);
        })->paginate(9);
        return response()->json(['status' => "success",'data'=>$article],201);
    }

    public function articleByBuyer(Request $request){
        $buyer_id = $request->input('id')??null;
        $article = Article::when($buyer_id,function($query,$buyer_id) {
            return $query->where('buyer_id', $buyer_id);
        })->paginate(9);
        return response()->json(['status' => "success",'data'=>$article],201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*if ($request->file('file')) {*/
            $article = new Article();
            $article->owner_id = $request->user()->id;
            $article->name = $request->name;
            $article->category_id = $request->category;
            $article->description = $request->description;
            $article->price = $request->price;
            $article->latitud = $request->input('latitud');;
            $article->longitud = $request->input('longitud');
            $article->save();

            foreach ($request->etiquetas as $etiqueta){
                $article->Tagger()->attach($etiqueta['id']);
            }



           /* $files = $request->file('file');
            if (!is_array($files)) {
                $files = [$files];
            }

            for ($i = 0; $i < count($files); $i++) {
                $photo = new Photo();
                $photo->id_article = $article->id;
                $file = $files[$i];
                $filename = $file->getClientOriginalName();
                $filename = generar_token_seguro(5) . $filename;
                $photo->image = $file->move('images', $filename);
                $photo->save();
            }*/
           // Mail::to($article->user->email)->send(new MailNewArticle($article));
            return response()->json(['status' => "success", 'data' => $article], 201);
        /*} else{*/
        /*}*/
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return $this->success(new  ArticleResource($article));
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
        dd(8);
        $article->category_id = $request->category_id;
        $article->description = $request->description;
        $article->price = $request->price;
        $article->location = $request->location;
        $article->save();
        return response()->json(['status'=>"success",'data'=>$article],201);
    }

    public function buyArticle(Request $request){
        $article = Article::findOrFail($request->article);
        $article->buyer_id = $request->user;
        $article->save();



        Mail::to($article->buyer->email)->send(new MailBuyArticle($article));

        return response()->json(['status'=>"success",'data'=>$article],201);

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
