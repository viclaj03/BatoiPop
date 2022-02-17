<?php

namespace App\Http\Controllers;

use App\Mail\MailReportMessage;
use App\Models\Message;
use App\Models\ReportArticle;
use App\Models\ReportMessage;
use App\Models\User;
use Facade\FlareClient\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportMessageController extends Controller
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
        $reportMessage= ReportMessage::paginate(8);
        return view('report.reportList',compact('reportMessage'));
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
        $reportMessage = ReportMessage::findOrFail($id);
        $reportMessage->delete();
        return back();
    }

    public function acceptedMessage($id)
    {
        $report = ReportMessage::findOrFail($id);
        $report->accepted = true;
        $report->save();

        Mail::to($report->message->userTransmitter->email)->send(new MailReportMessage($report));
        return back();
    }

    public function rejectedMessage($id)
    {
        $offer = ReportMessage::findOrFail($id);
        $offer->accepted = false;
        $offer->save();
        return back();
    }

    public function showReportByUser($id){
        $user = User::findOrFail($id);
        $reportMessage = $user->messageReportAccepted()->paginate(8);

        return view('report.reportList',compact('reportMessage'));
    }
}
