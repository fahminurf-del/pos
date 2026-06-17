<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        confirmDelete('Hapus user ?', 'User yang sudah dihapus tidak bisa dikembalikan'); 
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
        toast()->success('User berhasil disimpan');
        return redirect()->route('users.index');

    }
    public function gantiPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
            //  'password' => 'Password'::min(8)->letters()->numbers()->mixedCase()->symbols(),
        ],[
            'old_password.required' => 'Password lama harus diisi',
            'password.required' => 'Password baru harus diisi',
            'password.min' => 'Password baru minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);
        $user = User::find(Auth::id());
            if (!Hash::check($request->old_password, $user->password)) {
                toast()->error('Password lama tidak sesuai');
                return redirect()->route('dashboard');
            }
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            toast()->success('Password berhasil diubah');
            return redirect()->route('dashboard');

    }
    public function destroy(String $id)
    {
        $user = User::find($id);

        if(Auth::id() == $user->id){
            toast()->error('Tidak bisa menghapus akun yang sedang login');
            return redirect()->route('users.index');
        }
        $user->delete();
        toast()->success('User berhasil dihapus');
        return redirect()->route('users.index');
    }
}