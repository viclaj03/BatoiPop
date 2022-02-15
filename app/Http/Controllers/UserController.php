<?php

namespace App\Http\Controllers;

use App\Models\ReportArticle;
use App\Models\ReportMessage;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;
use function Symfony\Component\String\s;

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
        $stars = 0;
        if ($user->valorations->count() != 0) {
            foreach ($user->valorations as $valoration) {
                $stars += $valoration->stars;
            }
            $stars = (int) round($stars / $user->valorations->count(),1);
        }
        $starsClear = 5 - $stars;

        return view('users.fitxa',compact('user','reportArticle','reportMessage','stars','starsClear'));
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

    public function searchByParameters(Request $request){
        if ($request->tipe == 'email'){
            $users = User::email($request->name)->paginate(10);
        } else{
            $users = User::name($request->name)->paginate(10);
            }
        $users->appends(['name'=>$request->name,'tipe'=>$request->tipe]);
        return view('users.userList',compact('users'));
    }

}
