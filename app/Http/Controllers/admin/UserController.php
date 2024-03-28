<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\OtpNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{

    //  get all users
    public function alluser() {
        // $user = User::all();
        $softDeletedUsers = User::onlyTrashed()->get();
        return view('backend.user.delete',compact('softDeletedUsers'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve active users
        $user = User::where('status', 1)->get();

        // Retrieve soft-deleted users
        $softDeletedUsers = User::onlyTrashed()->get();

        return view('backend.user.index', compact('user', 'softDeletedUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype = $request->usertype;
        $password = rand(11111, 999999);
        $user->password = Hash::make($password);
        $user->save();

        $data = [
            "title" => "Your Temporary Password",
            "description" => "Dear $user->name, Thank You for registering with our platform \n your temporary password is $password, You can change it later"
        ];

        Notification::send($user, new OtpNotification($data));

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function restore($id)
    {
        // Find the soft-deleted user by ID
        $user = User::onlyTrashed()->find($id);

        // If the user exists, restore the user
        if ($user) {
            $user->restore();
            return redirect()->route('user.index')->with('success', 'User restored successfully.');
        } else {
            // If the user does not exist or is not soft-deleted, return an error message
            return redirect()->route('user.index')->with('error', 'User not found or already restored.');
        }
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
    public function destroy(string $id)
    {
        // Find the user by ID
        $user = User::find($id);
        $user->delete();

        // Check if there are any other active admins
        $remainingAdmins = User::where('usertype', 'admin')->where('status', 1)->count();
        if ($remainingAdmins > 0) {
            // If there are other active admins, stay on the index page
            return redirect()->route('user.index')->with('success', 'User deleted successfully.');
        } else {
            // If there are no other active admins, redirect to the login page or any other appropriate page
            return redirect()->route('login')->with('success', 'User deleted successfully.');
        }
    }
}
