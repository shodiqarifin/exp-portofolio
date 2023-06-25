<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public $_tipe;

    public function __construct()
    {
        $this->_tipe = 'education';
    }
    public function index()
    {
        $data = Riwayat::where('tipe', $this->_tipe)->orderBy('tgl_akhir', 'desc')->get();

        return view('admin.education.index', compact('data'));
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255|min:5',
            'info_1' => 'required',
            'info_2' => 'required',
            'info_3' => 'required',
            'tgl_mulai' => 'required',
        ], [
            'judul.required' => 'Judul harus diisi.',
            'judul.max' => 'Judul tidak boleh lebih 255 huruf.',
            'judul.min' => 'Judul harus lebih dari 5 huruf.',
            'isi.min' => 'Isi harus lebih dari 5 huruf.',
            'info_1' => 'Fakultas harus diisi.',
            'info_2' => 'Prodi harus diisi.',
            'info_3' => 'IPK harus diisi.',
            'tgl_mulai' => 'Tanggal mulai harus diisi.',
        ]);

        $data = [
            'judul' => $request->judul,
            'tipe' => $this->_tipe,
            'info_1' => $request->info_1,
            'info_2' => $request->info_2,
            'info_3' => $request->info_3,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
        ];

        Riwayat::create($data);

        return to_route('education.index')->with('success', 'Data berhasil ditambah.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = Riwayat::where('id', $id)->first();

        return view('admin.education.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|max:255|min:5',
            'info_1' => 'required',
            'info_2' => 'required',
            'info_3' => 'required',
            'tgl_mulai' => 'required',
        ], [
            'judul.required' => 'Judul harus diisi.',
            'judul.max' => 'Judul tidak boleh lebih 255 huruf.',
            'judul.min' => 'Judul harus lebih dari 5 huruf.',
            'isi.min' => 'Isi harus lebih dari 5 huruf.',
            'info_1' => 'Nama perusahaan harus diisi.',
            'info_2' => 'Nama perusahaan harus diisi.',
            'info_3' => 'Nama perusahaan harus diisi.',
            'tgl_mulai' => 'Tanggal mulai harus diisi.',
        ]);

        $data = [
            'judul' => $request->judul,
            'tipe' => $this->_tipe,
            'info_1' => $request->info_1,
            'info_2' => $request->info_2,
            'info_3' => $request->info_3,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
        ];

        Riwayat::where('id', $id)->update($data);

        return to_route('education.index')->with('success', 'Data berhasil ditambah.');
    }

    public function destroy(string $id)
    {
        Riwayat::where('id', $id)->where('tipe', $this->_tipe)->delete();

        return to_route('education.index')->with('success', 'Data berhasil dihapus.');
    }
}
