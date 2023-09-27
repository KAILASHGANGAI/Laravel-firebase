<?php

namespace App\Http\Controllers\firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Kreait\Laravel\Firebase\Facades\Firebase;

class LoginController extends Controller
{
    public function login(Request $request){
        $validator = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        try {
            if (Auth::attempt($validator)) {
               
            $firebaseAuth = Firebase::auth();
            $signInResult = $firebaseAuth->signInWithEmailAndPassword($request->email, $request->password);
            $user = $signInResult->data();

            $token = $request->input('device_token');
            $request->user()->update([
                'device_token' => $token
            ]); 

            if ($signInResult) {
                return view('welcome',['user'=>$user]);
            }else{
                return back()->withInput($request->all())->with('status','Creadientals didnot matched try again');
            }
        }else{

        }
        } catch (\Exception $e) {
            Session::flash('status','Login Failed, Try Again!'.$e->getMessage());
            return back()->withInput($request->all());
        }
    }
    public function logout(){
        // Firebase::logout();
        Auth::logout();
        return view('welcome');
    }
}
