<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\State;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StateController extends Controller
{
   

    function StatePage(){
        return view('pages.dashboard.state-page');
    }


    function StateList(Request $request){
        try{
            $user_id=Auth::id();
            // $rows= State::where('user_id',$user_id)->with('country')->get();
            $rows= State::where('user_id',$user_id)->with(['country','cities'])->get();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function StateCreate(Request $request){
        try{
            $request->validate([
                'name' => 'required|string|min:2',
                "country_id"=> 'required|string',
            ]);
            $user_id=Auth::id();
            State::create([
                'name'=>$request->input('name'),
                'country_id'=>$request->input('country_id'),
                'user_id'=>$user_id

            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function StateByID(Request $request){
        try{
            $request->validate([
                'id' => 'required|min:1'
            ]);
            $state_id=$request->input('id');
            $user_id=Auth::id();
            $rows=State::where('id',$state_id)->where('user_id',$user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function UpdateState(Request $request)
    {
        try {
            $user_id=Auth::id();
            $state_id=$request->input('id');

            $request->validate([
                'name' => 'required|string|max:50',
                "country_id"=> 'required|string',
                "id"=> 'required|string',
            ]);

            State::where('id',$state_id)->where('user_id',$user_id)->update([
                'name'=>$request->input('name'),
                'country_id'=>$request->input('country_id'),
            ]);

            return response()->json(['status' => 'success', 'message' => "Request Successful"]);

        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }

        
    }



    function StateDelete(Request $request){
        try{
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $user_id=Auth::id();
            $state_id=$request->input('id');
            State::where('id',$state_id)->where('user_id',$user_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


}
