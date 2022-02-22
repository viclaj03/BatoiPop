<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Mail\MailNewArticle;
use App\Models\Article;
use App\Models\ReportArticle;
use App\Models\Valoration;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class apiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum',['except'=>['index','show','articleByUser']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function success($data)
    {

        return response()->json(['status'=>"success",'data'=>$data],200);

    }


}
