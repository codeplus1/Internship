<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\OtpNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    //  get all users
    public function alluser()
    {
        // $user = User::all();
        $softDeletedUsers = User::onlyTrashed()->get();
        return view('backend.user.delete', compact('softDeletedUsers'));
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
        toast('Your Record has been submited!','success')->timerProgressBar();
        $data = [
            "title" => "Your Temporary Password",
            "description" => "Dear $user->name, Thank You for registering with our platform \n your temporary password is $password, You can change it later"
        ];

        Notification::send($user, new OtpNotification($data));

        return redirect()->route('user.index');
    }

    public function restore($id)
    {
        // Find the soft-deleted user by ID
        $user = User::onlyTrashed()->find($id);

        // If the user exists, restore the user
        if ($user) {
            $user->restore();
            toast('Your Record has been restored!','success')->timerProgressBar();
            return redirect()->route('user.index');
        } else {
            // If the user does not exist or is not soft-deleted, return an error message
            toast('user not found or already restored!','success')->timerProgressBar();
            return redirect()->route('user.index');
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
        $user = User::findOrFail($id);
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype = $request->usertype;
        $user->password = Hash::make($request->password);
        $user->update();
        toast('Your Record has been Updated!','success')->timerProgressBar();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the user by ID
        $user = User::find($id);
        $user->delete();
        toast('Your Record has been deleted!','success')->timerProgressBar();
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
