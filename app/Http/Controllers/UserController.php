<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        confirmDelete('Hapus data user ?', 'data user yang sudah dihapus tidak bisa dikembalikan'); 
        return view('users.index', compact('users'));
    }
    
    public function store(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'. $id,
        ],[
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
        ]);

        $newRequest = $request->all();

        if(!$id){
            $newRequest['password'] = Hash::make('12345678');
        }
        user::updateOrCreate(['id' => $id], $newRequest);
        toast()->success('Data user berhasil disimpan');
        return redirect()->route('users.index');

    }
}