<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $promos = Promo::latest()->paginate(10);
        return view('admin.promo.index', compact('promos'));
    }

    public function create()
    {
        return view('admin.promo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();
        $data['is_active'] = true;   // ← Tambahkan baris ini

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/promo'), $filename);
            $data['gambar'] = $filename;
        }

        Promo::create($data);

        return redirect()->route('admin.promo.index')
                        ->with('success', 'Promo berhasil ditambahkan dan aktif!');
    }

    public function edit($id)
    {
        $promo = Promo::findOrFail($id);
        return view('admin.promo.edit', compact('promo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $promo = Promo::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($promo->gambar && file_exists(public_path('images/promo/' . $promo->gambar))) {
                unlink(public_path('images/promo/' . $promo->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/promo'), $filename);
            $data['gambar'] = $filename;
        }

        $promo->update($data);

        return redirect()->route('admin.promo.index')
                        ->with('success', 'Promo berhasil diupdate!');
    }

    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);
        
        // Delete image
        if ($promo->gambar && file_exists(public_path('images/promo/' . $promo->gambar))) {
            unlink(public_path('images/promo/' . $promo->gambar));
        }

        $promo->delete();

        return redirect()->route('admin.promo.index')
                        ->with('success', 'Promo berhasil dihapus!');
    }

    public function toggleActive($id)
    {
        $promo = Promo::findOrFail($id);
        $promo->is_active = !$promo->is_active;
        $promo->save();

        return redirect()->route('admin.promo.index')
                        ->with('success', 'Status promo berhasil diubah!');
    }
}