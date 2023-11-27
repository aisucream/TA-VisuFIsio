<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDesc;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DescController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $user_id) : View
    {
        return view('auth.role', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'roles' => ['required','string','in:fisioterapis,dokter,admin,pasien'],
            'no_telp'=> ['required','string','max:14']
            ]);
         

        $desc= UserDesc::create([
            'user_id' => $request->input('user_id'),
            'role' => $request->role,
            'no_telp' => $request->no_telp,
        ]);

        event(new Registered($desc));

        return redirect(RouteServiceProvider::HOME);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user_id = $request->input('user_id');

        // Hapus user dan deskripsi user
        User::find($user_id)->delete();
        UserDesc::where('user_id', $user_id)->delete();

        return redirect('/register')->with('error', 'Pendaftaran dibatalkan.');
    }
}
