<?php

namespace App\Http\Controllers\firebase;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Contract\Auth as fAuth;

class UserController extends Controller
{
    private $Firebaseauth;
    public function __construct(fAuth $auth)
    {
                $this->Firebaseauth = $auth;
    }
  
    public function register(Request $request){
   
        $validator = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        try{
            $userProperties = [
                'email' => $request->email,
                'emailVerified' => false,
                'phoneNumber' =>$request->phone,
                'password' => $request->password,
                'displayName' =>$request->name,
                'disabled' => false,

            ];
            
            $createdUser = $this->Firebaseauth->createUser($userProperties);
            $customClaims = [
                'role'=>'admin'
            ];
            $this->Firebaseauth->setCustomUserClaims($createdUser->uid, $customClaims);
            $new = new User();
            $new->uid	= $createdUser->uid;
            $new->name	 = $request->name;
            $new->email	= $request->email;
            $new->password	= Hash::make($request->password);
              $status = $new->save();
             
            if ($createdUser && $status) {
                Session::flash('status','register successful');
                 return redirect('/login');     
            }else{
                Session::flash('status','Registration Failed, Try Again!');
                 return back()->withInput($request->all());
            }
            //  $this->Firebaseauth->signInWithEmailAndPassword($request->email, $request->password);
            

        }catch(\Exception $e){
            Session::flash('status','Registration Failed, Try Again!'.$e->getMessage());
            return back()->withInput($request->all());
        }
    //    return redirect('register');

    }
    public function login(Request $request){
        try {
            $signInResult = $this->Firebaseauth->signInWithEmailAndPassword($request->email, $request->password);
            if ($signInResult) {
                $user = $signInResult->data();
                return view('firebase.contact',['user'=>$user]);
            }else{
                return back()->withInput($request->all())->with('status','Creadientals didnot matched try again');
            }
        } catch (\Exception $e) {
            Session::flash('status','Registration Failed, Try Again!'.$e->getMessage());
            return back()->withInput($request->all());
        }
        

    }   
}
