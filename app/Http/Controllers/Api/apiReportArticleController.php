<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportArticleRequest;
use App\Models\ReportArticle;
use Illuminate\Http\Request;

class apiReportArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum',['except'=>['index','show']]);
    }

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportArticleRequest $request)
    {
        $report = new ReportArticle();
        $report->article_id = $request->article;
        $report->user_id = $request->user()->id;
        if ($request->reportComent) {
            $report->description = $request->reportComent;
        }
        $report->save();
        return response()->json(['status'=>"success",'data'=>$report],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportArticle  $reportArticle
     * @return \Illuminate\Http\Response
     */
    public function show(ReportArticle $reportArticle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportArticle  $reportArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReportArticle $reportArticle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportArticle  $reportArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportArticle $reportArticle)
    {
        //
    }
}
