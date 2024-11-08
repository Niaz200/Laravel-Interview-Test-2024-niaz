<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\City;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
   


    function CityPage(){
        return view('pages.dashboard.city-page');
    }


    function CityList(Request $request){
        try{
            $user_id=Auth::id();
            $rows= City::where('user_id',$user_id)->with('country')->with('state')->get();
            // $rows= City::with('state.country')->get();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function CityCreate(Request $request){
        try{
            $request->validate([
                'name' => 'required|string|min:2',
                "country_id"=> 'required|string',
                "state_id"=> 'required|string',
            ]);
            $user_id=Auth::id();
            City::create([
                'name'=>$request->input('name'),
                'country_id'=>$request->input('country_id'),
                'state_id'=>$request->input('state_id'),
                'user_id'=>$user_id

            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function CityByID(Request $request){
        try{
            $request->validate([
                'id' => 'required|min:1'
            ]);
            $state_id=$request->input('id');
            $user_id=Auth::id();
            $rows=City::where('id',$state_id)->where('user_id',$user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function UpdateCity(Request $request)
    {
        try {
            $user_id=Auth::id();
            $city_id=$request->input('id');

            $request->validate([
                'name' => 'required|string|max:50',
                "country_id"=> 'required|string',
                "state_id"=> 'required|string',
                "id"=> 'required|string',
            ]);

            City::where('id',$city_id)->where('user_id',$user_id)->update([
                'name'=>$request->input('name'),
                'country_id'=>$request->input('country_id'),
                'state_id'=>$request->input('state_id'),
            ]);

            return response()->json(['status' => 'success', 'message' => "Request Successful"]);

        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }

        
    }


    function CityDelete(Request $request){
        try{
            $request->validate([
                'id' => 'required|string|min:1'
            ]);

            $user_id=Auth::id();
            $city_id=$request->input('id');

            City::where('id',$city_id)->where('user_id',$user_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
}
