<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Country;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{
  

    function CountryPage(){
        return view('pages.dashboard.country-page');
    }

    // function CategoryPage(){
    //     return view('pages.dashboard.category-page');
    // }



    function CountryList(Request $request){
        try{
            $user_id=Auth::id();
            // $rows= Country::where('user_id',$user_id)->get();
            $rows= Country::where('user_id',$user_id)->with('states')->get();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    
    function CountryCreate(Request $request){
        try{
            $request->validate([
                'name' => 'required|string|min:2'
            ]);
            $user_id=Auth::id();
            Country::create([
                'name'=>$request->input('name'),
                'user_id'=>$user_id
            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function CountryByID(Request $request){
        try{
            $request->validate([
                'id' => 'required|min:1'
            ]);
            $country_id=$request->input('id');
            $user_id=Auth::id();
            $rows=Country::where('id',$country_id)->where('user_id',$user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function CountryUpdate(Request $request){

        try {
            $request->validate([
                'id' => 'required|string|min:1',
                'name' => 'required|string|min:2'
            ]);

            $country_id=$request->input('id');
            $user_id=Auth::id();
            Country::where('id',$country_id)->where('user_id',$user_id)->update([
                'name'=>$request->input('name'),
            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);

        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function CountryDelete(Request $request){
        try{
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $user_id=Auth::id();
            $country_id=$request->input('id');
            Country::where('id',$country_id)->where('user_id',$user_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



   



}
