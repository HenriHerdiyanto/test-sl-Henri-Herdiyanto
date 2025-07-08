<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'] ?? null;
        $user->address = $validated['address'] ?? null;

        // Jika password diisi, update
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function AddPegawai(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:6|confirmed',
            'role'      => 'required|in:staff,manager,superadmin',
            'phone'     => 'nullable|string|max:20',
            'address'   => 'nullable|string|max:255',
            'id_divisi' => 'nullable|exists:divisis,id',
        ]);

        // Simpan ke database
        User::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'password'   => Hash::make($validated['password']),
            'role'       => $validated['role'],
            'phone'      => $validated['phone'],
            'address'    => $validated['address'],
            'id_divisi'  => $validated['id_divisi'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Pegawai berhasil ditambahkan.');
    }
    public function updatePegawai(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'role'      => 'required|in:staff,manager,superadmin',
            'password'  => 'nullable|string|min:6',
            'phone'     => 'nullable|string|max:20',
            'address'   => 'nullable|string|max:255',
            'id_divisi' => 'nullable|exists:divisis,id',
        ]);

        // Update manual agar tidak overwrite password jika kosong
        $user->name      = $validated['name'];
        $user->email     = $validated['email'];
        $user->role      = $validated['role'];
        $user->phone     = $validated['phone'] ?? null;
        $user->address   = $validated['address'] ?? null;
        $user->id_divisi = $validated['id_divisi'] ?? null;

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'Data pegawai berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Pegawai berhasil dihapus.');
    }
}
