<?php

namespace App\Http\Controllers;

use App\Mail\MailReportArticle;
use App\Models\ReportArticle;
use App\Models\User;
use http\Message\Body;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportArticleController extends Controller
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
        $reportArticle = ReportArticle::paginate(8);
        return view('report.reportList',compact('reportArticle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $reportMessage = ReportArticle::findOrFail($id);
        $reportMessage->delete();
        return back();
    }

    public function acceptedArticle($id)
    {
        $report = ReportArticle::findOrFail($id);
        $report->accepted = true;
        $report->save();

        Mail::to($report->article->user->email)->send(new MailReportArticle($report));
        return back();
    }

    public function rejectedArticle($id)
    {
        $report = ReportArticle::findOrFail($id);
        $report->accepted = false;
        $report->save();

        return back();
    }


    public function showReportByUser($id){
        $user = User::findOrFail($id);
        $reportArticle = $user->articleReportAccepted()->paginate(10);
        return view('report.reportList',compact('reportArticle'));
    }

}
