<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function DashboardPage():View{

    
        return view('pages.dashboard.dashboard-page');
    }

    function DashboardDetails(Request $request){
         $user = Auth::user();
        //  return $user;
        return response()->json($user);
        
    }


    // function UserProfile(Request $request){
    //     return Auth::user();
    // }




   
}
