<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return view('users.index', ['usuarios'=> $usuarios]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('users.create', ['roles' => Roles::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'nullable|max:45',
            'username' => 'required|max:45',
            'password' => 'required|confirmed',
            'email' => 'required|email|confirmed|max:255',


        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->tipo = $request ->input('rol');
        $user->save();

        return view('users.message', ['msg' => "REGISTRO GUARDADO"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user, 'roles' => Roles::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'name' => 'nullable|max:45',
            'username' => 'required|max:45',
            'password' => 'required|confirmed',
            'email' => 'required|email|confirmed|max:255',
            'rol' => 'required'

        ]);

        $user = User::find($id);
        if ($user) {
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->password = Hash::make($request->input('password'));
            $user->email = $request->input('email');
            $user->tipo = $request->input('rol');
            $user->save();

            return view('users.message', ['msg' => "REGISTRO GUARDADO"]);
        } else {
            // Maneja el caso en que el usuario no existe
            return view('users.message', ['msg' => "USUARIO NO ENCONTRADO"]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user ->delete();

        return redirect('users');
    }
}
