<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Mail\MailMessageSedder;
use App\Models\Article;
use App\Models\Message;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class apiMessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message();
        $message->id_transmitter = $request->user()->id;
        $message->id_article = $request->id_article;
        $message->message = $request->message;
        $message->save();
        return response()->json(new MessageResource($message),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }


    public function messageBuy(Request $request){
        $message = new Message();
        $message->buy = true;
        $message->id_transmitter = $request->user()->id;
        $message->id_article = $request->article;
        $message->message = $request->message;
        $message->save();
        //Mail::to($message->article->user->email)->send(new MailMessageSedder($message));
        return response()->json(['status'=>"success",'data'=>$message],201);
    }
}
