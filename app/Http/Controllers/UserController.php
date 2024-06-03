<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::with('role')->get();
        return view('users.index', ['usuarios'=> $usuarios]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('users.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'first_name' => 'nullable|max:45',
        'last_name' => 'required|max:45',
        'password' => 'required|confirmed',
        'email' => 'required|email|confirmed|max:255',
        'role_id' => 'required|exists:roles,id',
    ]);

    $user = new User();
    $user->first_name = $request->input('first_name');
    $user->last_name = $request->input('last_name');
    $user->password = Hash::make($request->input('password'));
    $user->email = $request->input('email');
    $user->role_id = $request->input('role_id');
    $user->save();

    return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
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
        return view('users.edit', ['user' => $user, 'roles' => Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'nullable|max:45',
            'last_name' => 'required|max:45',
            'password' => 'required|confirmed',
            'email' => 'required|email|confirmed|max:255',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::find($id);
        if ($user) {
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->password = Hash::make($request->input('password'));
            $user->email = $request->input('email');
            $user->role_id = $request->input('role_id');
            $user->save();

            return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
        } else {
            return redirect()->route('users.index')->with('error', 'Usuario no encontrado.');
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
