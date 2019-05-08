<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Problem;
use App\User;
use App\Event;
use App\Reaction;
use DB;

class EventViewerController extends Controller
{
    public function index()
    {
    	$events = Event::all();
    	return view('events',compact('events'));
    }

    public function detail($id)
    {
    	$events = Event::where('id',$id)->with('problem')->first();
        
        $problems = Problem::where('event_id',$id)->with('reaction','user')->get();
        //return $users;
    	//return $problems;
    	return view('eventDetail',compact('events','problems','users','reactions','re_id'));
    }
}
