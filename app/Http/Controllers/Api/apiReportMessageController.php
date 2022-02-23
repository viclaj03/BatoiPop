<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportMessageRequest;
use App\Models\ReportMessage;
use Illuminate\Http\Request;

class apiReportMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(ReportMessageRequest $request)
    {
        $report = new ReportMessage();
        $report->article_id = $request->message;
        $report->user_id = $request->user()->id;
        $report->description = $request->reportComent;
        $report->save();
        return response()->json(['status'=>"success",'data'=>$report],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportMessage  $reportMessage
     * @return \Illuminate\Http\Response
     */
    public function show(ReportMessage $reportMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportMessage  $reportMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReportMessage $reportMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportMessage  $reportMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportMessage $reportMessage)
    {
        //
    }
}
