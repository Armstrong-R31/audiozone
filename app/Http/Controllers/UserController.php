<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $credentials = $request->only('username', 'password');
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials',
            ], 401);
        }

        return redirect()->route('home');
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|unique:users,username|max:255',
            'forename' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $profilePicturePath = 'default.png';
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $profilePicturePath = $file->storeAs('profile_pictures', $file->getClientOriginalName(), 'azure');
        }

        $user = User::create([
            'username' => $request->username,
            'forename' => $request->forename,
            'surname' => $request->surname,
            'password' => Hash::make($request->password),
            'profile_picture' => $profilePicturePath,
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function index()
    {
        $artists = User::select('username', 'profile_picture')->get();

        return $artists;
    }

    public function viewAlbums($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $albums = $user->albums;

        return view('components.view-artist', [
            'user' => $user,
            'albums' => $albums,
        ]);
    }
}
