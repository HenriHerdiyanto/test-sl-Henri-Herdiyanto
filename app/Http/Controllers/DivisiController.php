<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $divisis = Divisi::all();
        return view('superadmin.divisi.index', compact('divisis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Divisi::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Divisi berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $divisi = Divisi::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $divisi->update(['name' => $request->name]);

        return redirect()->back()->with('success', 'Divisi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $divisi = Divisi::findOrFail($id);
        $divisi->delete();

        return redirect()->back()->with('success', 'Divisi berhasil dihapus.');
    }
}
