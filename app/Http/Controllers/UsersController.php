<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UsersController extends Controller
{
    public function getAllUsers()
    {
        $users = Users::orderBy('username', 'asc')->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data User',
            'data' => $users
        ], 200);
    }

    public function getUser($id)
    {
        $user = Users::find($id);

        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Detail user',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data user tidak ditemukan!',
                'data' => ''
            ], 404);
        }
    }

    public function getUserByEmail($email)
    {
        $user = Users::where('email', $email)->first();

        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Detail user',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data user tidak ditemukan!',
                'data' => ''
            ], 404);
        }
    }

    public function getUserByUsername($username)
    {
        $user = Users::where('username', $username)->first();

        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Detail user',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data user tidak ditemukan!',
                'data' => ''
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
            'email' => 'required|max:255',
            'fullname' => 'required|max:255',
            'phone' => 'required|max:255',
            'city_name' => 'required|max:255',
        ]);

        $timezone = 'Asia/Jakarta';
        $now = Carbon::now($timezone);

        $validateData['created_at'] = $now;
        $validateData['updated_at'] = $now;


        $user = Users::create($validateData);

        return response()->json([
            'success' => true,
            'message' => 'Data produk berhasil ditambahkan',
            'data' => $user
        ], 200);
    }

    public function updateUser(Request $request, $id)
    {
        $validateData = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|max:255',
            'fullname' => 'required|max:255',
            'phone' => 'required|max:255',
            'city_name' => 'required|max:255',
        ]);

        $user = Users::find($id);

        if ($user) {
            $user->update($validateData);

            return response()->json([
                'success' => true,
                'message' => 'Data produk berhasil diupdate',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data produk tidak ditemukan!',
                'data' => ''
            ], 404);
        }
    }

    public function destroy($id)
    {
        $user = Users::find($id);

        if ($user) {
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data produk berhasil dihapus',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data produk tidak ditemukan!',
                'data' => ''
            ], 404);
        }
    }
}
