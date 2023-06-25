<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public $_tipe;

    public function __construct()
    {
        $this->_tipe = 'experience';
    }
    public function index()
    {
        $data = Riwayat::where('tipe', $this->_tipe)->orderBy('tgl_akhir', 'desc')->get();

        return view('admin.experience.index', compact('data'));
    }

    public function create()
    {
        return view('admin.experience.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255|min:5',
            'info_1' => 'required',
            'tgl_mulai' => 'required',
            'isi' => 'required|min:5',
        ], [
            'judul.required' => 'Judul harus diisi.',
            'judul.max' => 'Judul tidak boleh lebih 255 huruf.',
            'judul.min' => 'Judul harus lebih dari 5 huruf.',
            'isi.min' => 'Isi harus lebih dari 5 huruf.',
            'info_1' => 'Nama perusahaan harus diisi.',
            'tgl_mulai' => 'Tanggal mulai harus diisi.',
            'isi.required' => 'Isi harus diisi.',
        ]);

        $data = [
            'judul' => $request->judul,
            'tipe' => $this->_tipe,
            'info_1' => $request->info_1,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->isi,
        ];

        Riwayat::create($data);

        return to_route('experience.index')->with('success', 'Data berhasil ditambah.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = Riwayat::where('id', $id)->first();

        return view('admin.experience.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|max:255|min:5',
            'info_1' => 'required',
            'tgl_mulai' => 'required',
            'isi' => 'required|min:5',
        ], [
            'judul.required' => 'Judul harus diisi.',
            'judul.max' => 'Judul tidak boleh lebih 255 huruf.',
            'judul.min' => 'Judul harus lebih dari 5 huruf.',
            'isi.min' => 'Isi harus lebih dari 5 huruf.',
            'info_1' => 'Nama perusahaan harus diisi.',
            'tgl_mulai' => 'Tanggal mulai harus diisi.',
            'isi.required' => 'Isi harus diisi.',
        ]);

        $data = [
            'judul' => $request->judul,
            'tipe' => $this->_tipe,
            'info_1' => $request->info_1,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->isi,
        ];

        Riwayat::where('id', $id)->update($data);

        return to_route('experience.index')->with('success', 'Data berhasil ditambah.');
    }

    public function destroy(string $id)
    {
        Riwayat::where('id', $id)->where('tipe', $this->_tipe)->delete();

        return to_route('experience.index')->with('success', 'Data berhasil dihapus.');
    }
}
