<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class CustomAuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function registration(){
        return view('auth.registration');
    }

    public function registerUser(Request $request){

        $request->validate([
            'username' => 'required|string|alpha|max:50|unique:users',
            'first_name' => 'required|string|alpha',
            'last_name' => 'required|string|alpha',
            'password' => ['required', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required|same:password',
            'mobile_number' => ['required', 'max:11', 'unique:users', 'regex:/^(?:\+?46|0)[\d\s-]{9,}$/'],
        ], [
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, one special character and must be at least 8 characters long.'
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = Hash::make($request->password);
        $user->mobile_number = $request->mobile_number;
        $user->role_id = 1;
        $result = $user->save();
        if ($result) {
            return redirect('/')->with('success', 'You have registered succesfully. Please login now!');
        }else{
            return back()->with('fail', 'something went wrong.');
        }
    }


    public function loginUser(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
    
        $user = User::where('username', '=', $request->username)->first();
        if ($user) {
            if (Hash::check($request->password,$user->password)){
                if ($user->role_id) {
                    $role_id = $user->role_id;
                    if ($role_id >= 1 && $role_id <= 3) {
                        $request->session()->put('loginId', $user->id);
                        $request->session()->put('roleId', $role_id);
                        if ($role_id == 1) {
                            return redirect('user');
                        } elseif ($role_id == 2) {
                            return redirect('poweruser');
                        } elseif ($role_id == 3) {
                            return redirect('admin');
                        }
                    } else {
                        return back()->with('fail', 'This user has an invalid role assigned.');
                    }
                } else {
                    return back()->with('fail', 'This user does not have a role assigned.');
                }
            } else {
                return back()->with('fail', 'Password not matches.');
            }
        } else {
            return back()->with('fail', 'This username is not registered.');
        }
    }


    public function user(){
        $data = array();
        if(session::has('loginId')) {
            $data = User::where('id', '=', session::get('loginId'))->first();
        }
        return view('roles.user', compact('data'));
        
    }


    public function admin(){
        $users = User::all();
        return view('roles.admin', compact('users'));
    }

    public function poweruser()
    {
        $users = User::all()->where('role_id', '!=', 3);
        return view('roles.poweruser', compact('users'));
    }
    


    public function userProfile(Request $request){
        
        $data = array();
        if(session::has('loginId')) {
            $data = User::where('id', '=', session::get('loginId'))->first();
        }
        return view('userProfile', compact('data'));
    }

    public function logout(){
        if (session::has('loginId')) {
            session::pull('loginId');
            return redirect('');
        }
    }

    

}