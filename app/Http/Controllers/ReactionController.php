<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Problem;
use App\User;
use App\Event;
use App\Reaction;
use Auth;
use DB;

class ReactionController extends Controller
{
    public function create($event_id, $problem_id) 
    {
    	//return $event_id;
    	Reaction::create([
    		'user_id'	=>Auth::user()->id,
    		'problem_id'=>$problem_id,
    		'event_id'	=>$event_id,
    	]);
    	return redirect()->back();
    }

    public function iwannahelp()
    {
        $reactions = Reaction::where('user_id',Auth::user()->id)->with('problem')->get();
        //return $reactions;
        foreach($reactions as $user){
            $users[] = User::where('id', $user->problem->user_id)->first();
        }
        //return $users;
        return view('iwannahelp',compact('reactions','users'));
    }

    public function gethelp()
    {
        $problems = Problem::where('user_id',Auth::user()->id)->get();
        //return $problems;
            
        $reactions = Reaction::with('user')->get();
        
        //return $reactions;
        return view('gethelp', compact('problems','reactions'));
    }





















}
