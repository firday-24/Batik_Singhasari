<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilToko;
use Illuminate\Http\Request;

class ProfilTokoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profil = ProfilToko::first();
        return view('admin.profil.index', compact('profil'));
    }

    public function edit()
    {
        $profil = ProfilToko::first();
        
        if (!$profil) {
            $profil = new ProfilToko();
        }
        
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kontak' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'email' => 'nullable|email',
            'whatsapp' => 'nullable|string',
            'logo_toko' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $profil = ProfilToko::first();
        
        if (!$profil) {
            $profil = new ProfilToko();
        }

        $data = $request->all();

        if ($request->hasFile('logo_toko')) {
            // Delete old logo
            if ($profil->logo_toko && file_exists(public_path('images/logo/' . $profil->logo_toko))) {
                unlink(public_path('images/logo/' . $profil->logo_toko));
            }

            $file = $request->file('logo_toko');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/logo'), $filename);
            $data['logo_toko'] = $filename;
        }

        if ($profil->exists) {
            $profil->update($data);
        } else {
            ProfilToko::create($data);
        }

        return redirect()->route('admin.profil.index')
                        ->with('success', 'Profil toko berhasil diupdate!');
    }
}