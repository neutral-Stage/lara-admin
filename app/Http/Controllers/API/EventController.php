<?php

namespace App\Http\Controllers\API;

use App\Problem;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Event;
use DB;
class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $users = DB::table('events')
        // ->leftjoin('users', 'users.id', '=', 'events.user_id')
        // ->leftjoin('problems', 'problems.event_id', '=', 'events.id')
        // ->select('users.id','users.name', 'problems.id as problem_id','problems.user_id as proUser_id','problems.problem', 'events.*')
        // ->get();
        // $obj = json_decode(json_encode($users));
        // return $obj;
        return Event::with('user','problem')->latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Event::create([
            'expired_date' => $request['expired_date'],
            'comment' => $request['comment'],
            'user_id' =>Auth::user()->id
            
        ]);
       

       return ['message'=>'Success'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    
}
