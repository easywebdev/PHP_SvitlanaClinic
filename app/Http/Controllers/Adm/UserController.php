<?php

namespace   App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller 
{
    public function getUserProfile(Request $request) 
    {
        $user = $request->user();
        
        return view('adm.editprofile', [
            'user' => $user,
        ]);
    }

    public function updateUserProfile(Request $request) 
    {
        // Validate
        //Validate
        $request->validate([
            'email'    => 'required|email',
        ]);
        
        $user = User::find($request->input('id'));
        $user->email = $request->input('email');
        $user->save();

        return redirect(route('getUserProfile'));
    }
}