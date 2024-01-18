<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::with('userDesc')->paginate(5);

        return view("admin.account", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return view("admin.accountDetail", compact("user"));
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
    public function destroy(string $id)
    {
        $protectedUserIds = [1, 2]; 
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('account')->with('error', 'User not found.');
        }

        if (in_array($user->id, $protectedUserIds)) {
            return redirect()->route('account')->with('error', 'This user cannot be deleted.');
        }

        // Soft delete user
        $user->delete();

        return redirect()->route('account')->with('success', 'User deactivated successfully.');

    }
}
