<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function update(UpdateProfileRequest $request)
   {
        auth()->user()->update($request->only('name', 'email'));

        if ($request->input('new_password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('new_password'))
            ]);
        }

        return redirect()->route('profile')->with('message', 'Profile saved successfully.');
   }
}
