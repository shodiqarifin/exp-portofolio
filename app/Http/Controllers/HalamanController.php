<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function index()
    {
        $halaman = Halaman::orderBy('judul', 'asc')->get();

        return view('admin.halaman.index', compact('halaman'));
    }

    public function create()
    {
        return view('admin.halaman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255|min:5',
            'isi' => 'required|min:5'
        ], [
            'judul.required' => 'Judul harus diisi.',
            'judul.max' => 'Judul tidak boleh lebih 255 huruf.',
            'judul.min' => 'Judul harus lebih dari 5 huruf.',
            'isi.required' => 'Isi harus diisi.',
            'isi.min' => 'Isi harus lebih dari 5 huruf.'
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi
        ];

        Halaman::create($data);

        return to_route('halaman.index')->with('success', 'Halaman berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = Halaman::where('id', $id)->first();

        return view('admin.halaman.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|max:255|min:5',
            'isi' => 'required|min:5'
        ], [
            'judul.required' => 'Judul harus diisi.',
            'judul.max' => 'Judul tidak boleh lebih 255 huruf.',
            'judul.min' => 'Judul harus lebih dari 5 huruf.',
            'isi.required' => 'Isi harus diisi.',
            'isi.min' => 'Isi harus lebih dari 5 huruf.'
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi
        ];

        Halaman::where('id', $id)->update($data);

        return to_route('halaman.index')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(string $id)
    {
        Halaman::where('id', $id)->delete();

        return to_route('halaman.index')->with('success', 'Berhasil menghapus data.');
    }
}
