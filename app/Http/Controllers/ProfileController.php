<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\Facades\Toast;

class ProfileController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    public function update(UpdateProfileRequest $request){

        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'idNumber' => $request->idNumber,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);
        Toast::title('Profile Updated')->message('Your profile has been updated.')->autoDismiss(2)->success();
        return redirect()->route('profile.index');

    }
}
