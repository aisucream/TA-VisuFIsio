<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDesc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class RegisteredUserController extends Controller
{
  public function buat()
    {
        return view('auth.register');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8','regex:/\d+/',Rules\Password::defaults()],
            'type' => ['required','string','in:mobile,web'],
        ]);

        $pengguna = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('daftar.peran', ['id' => $pengguna->id]);
    }

    public function peran($id)
    {
        return view('auth.role', compact('id'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'role' => ['required', 'string', 'in:fisioterapis,dokter,admin,pasien'],
            'no_telp' => ['required', 'string', 'regex:/^[0-9]{12}$/', 'min:12','max:12'],
        ]);

        $pengguna = User::findOrFail($id);

        UserDesc::create([
            'user_id' => $pengguna->id,
            'roles' => $request->role,
            'no_telp' => $request->no_telp,
        ]);
// oke
        return redirect('dashboard');
    }

}
