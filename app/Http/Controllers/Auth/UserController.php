<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Mail\OTPMail;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    function LoginPage():View{
        return view('pages.auth.login-page');
    }

    function RegistrationPage():View{
        return view('pages.auth.registration-page');
    }

    function SendOtpPage():View{
        return view('pages.auth.send-otp-page');
    }
    function VerifyOTPPage():View{
        return view('pages.auth.verify-otp-page');
    }

    function ResetPasswordPage():View{
        return view('pages.auth.reset-pass-page');
    }

    function profilePage():View{
        return view('pages.dashboard.profile-page');
    }


    //user Register
    function UserRegistration(Request $request){
        try {
            $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users,email',
                'password' => 'required|string|min:3|confirmed'
            ]);

            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);
            return response()->json(['status' => 'success', 'message' => 'User Registration Successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    //user login
    function UserLogin(Request $request){
        try {
            $request->validate([
                'email' => 'required|string|email|max:50',
                'password' => 'required|string|min:3'
            ]);

            $user = User::where('email', $request->input('email'))->first();
     


            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                return response()->json(['status' => 'failed', 'message' => 'Invalid User']);
            }



            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['status' => 'success', 'message' => 'Login Successful','token'=>$token]);

        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function UserProfile(Request $request){
        return Auth::user();
    }



    function UpdateProfile(Request $request){

        try{
            $request->validate([
                'name' => 'required|string|max:50',
                // 'password' => 'required|string|max:150',
            ]);

            User::where('id','=',Auth::id())->update([
                'name'=>$request->input('name'),
                'password' => Hash::make($request->input('password')),
             
            ]);

            return response()->json(['status' => 'success', 'message' => 'Request Successful']);

        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    //user Logout

    function UserLogout(Request $request){
        $request->user()->tokens()->delete();
        return redirect('/userLogin');
    }



    function SendOTPCode(Request $request){

        try {

            $request->validate([
                'email' => 'required|string|email|max:50'
            ]);

            $email=$request->input('email');
            $otp=rand(1000,9999);
            $count=User::where('email','=',$email)->count();

            if($count==1){
                Mail::to($email)->send(new OTPMail($otp));
                User::where('email','=',$email)->update(['otp'=>$otp]);
                return response()->json(['status' => 'success', 'message' => '4 Digit OTP Code has been send to your email !']);
            }
            else{
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Invalid Email Address'
                ]);
            }

        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    function VerifyOTP(Request $request){

        try {
            $request->validate([
                'email' => 'required|string|email|max:50',
                'otp' => 'required|string|min:4'
            ]);

            $email=$request->input('email');
            $otp=$request->input('otp');

            // $user = User::where('email', $email)->where('otp', $otp)->first();
            $user = User::where('email','=',$email)->where('otp','=',$otp)->first();

            if(!$user){
                return response()->json(['status' => 'fail', 'message' => 'Invalid OTP']);
            }

            // CurrentDate-UpdatedTe=4>Min

            User::where('email','=',$email)->update(['otp'=>'0']);

            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['status' => 'success', 'message' => 'OTP Verification Successful','token'=>$token]);

        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
    
    
    function ResetPassword(Request $request){

        try{
            $request->validate([
                // 'password' => 'required|string|min:3'
                'password' => 'required|string|min:3'
            ]);
            $id=Auth::id();
            $password=$request->input('password');
            User::where('id','=',$id)->update(['password'=>Hash::make($password)]);
            return response()->json(['status' => 'success', 'message' => 'Request Successful']);

        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage(),]);
        }
    }

    
    
}
