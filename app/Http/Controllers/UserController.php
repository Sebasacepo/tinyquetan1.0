<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function create(Request $request){
        $user = new User;
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = Hash::make($request ->password);
        $user -> save();

        return redirect('\users');
    }
    public function show(string $id): View {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}
