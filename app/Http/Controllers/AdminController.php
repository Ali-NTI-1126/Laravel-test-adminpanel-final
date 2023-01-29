<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function create()
{
    return view('users.create');
}

public function store(Request $request)
{
    $request->validate([
        'username' => 'required|string|alpha|max:50|unique:users',
        'first_name' => 'required|string|alpha',
        'last_name' => 'required|string|alpha',
        'password' => ['required', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/', 'string', 'min:8', 'confirmed'],
        'password_confirmation' => 'required|same:password',
        'mobile_number' => ['required', 'max:11', 'unique:users', 'regex:/^(?:\+?46|0)[\d\s-]{9,}$/'],
        'role_id' => 'required',
    ], [
        'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, one special character and must be at least 8 characters long.'
    ]);


    $user = new User;
    $user->username = $request->username;
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->password = Hash::make($request->password);
    $user->mobile_number = $request->mobile_number;
    $user->role_id = $request->role_id;
    $result = $user->save();
    if ($result) {
        return redirect('admin')->with('success', 'user createt succesfully');
    }else{
        return back()->with('fail', 'something went wrong.');
    }

}

public function edit($id)
{
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->update($request->all());
    return redirect()->route('admin')->with('success', 'user edited succesfully');

}


public function editRole($id)
{
    $user = User::findOrFail($id);
    return view('users.editRole', compact('user'));
}

public function updateRole(Request $request, $id)
{
    $user = User::findOrFail($id);
    
    $user->update($request->all());
    return redirect()->route('poweruser')->with('success', 'user edited succesfully');
}



public function destroy($id)
{
    $user = User::find($id);
    $user->delete();

    return redirect('admin')->with('success', 'user deleted succesfully');
}

}
