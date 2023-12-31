<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('tasks.profile',compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'email' =>'required|email|string|max:255',
            'contact_number' =>'required',
            'address_line_1' =>'required',
            'address_line_2' =>'nullable',
            'pin_code' =>'required',
            'state' =>'required'
        ]);

        $user = User::find($user_id);

        if (!$user) {
            return back()->with('error', 'User not found');
        }

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'contact_number' => $request['contact_number'],
            'address_line_1' => $request['address_line_1'],
            'address_line_2' => $request['address_line_2'],
            'pin_code' => $request['pin_code'],
            'state' => $request['state'],
        ]);

        return back()->with('message','Profile Updated');
    }

}