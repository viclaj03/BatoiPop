<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\ReportArticle;
use App\Models\ReportMessage;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users = User::paginate(10);
        return view('users.userList',compact('users'));
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
        $user = User::findOrFail($id);
        $reportArticle = 0;
        $reportMessage= 0;
        foreach ($user->articles as $article){
            $reportArticle += $article->reports->where('accepted',true)->count();
        }
        foreach ($user->messageTransmitter as $message){
            $reportMessage += $message->reports->where('accepted',true)->count();
        }
        return view('users.fitxa',compact('user','reportArticle','reportMessage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }

    public function usersReport(){

        $reportsMessage = ReportMessage::with('message')->where('accepted',true)->get();
        $reportsArticle = ReportArticle::with('article')->where('accepted',true)->get();
        $allReports = $reportsMessage->concat($reportsArticle)->groupBy('nameUser');

        return view('report.reportUsers',compact('allReports'));
    }

}
