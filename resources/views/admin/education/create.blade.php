@extends('admin.layout')

@section('content')
    <div class="pb-3">
        <a href="{{ route('education.index') }}">Education</a> / Tambah
    </div>
    <form action="{{ route('education.store') }}" method="post">
        @csrf
        @method('post')

        <div class="form-group">
            <label for="judul" class="form-label">Universitas</label>
            <input type="text" class="form-control form-control-sm" name="judul" id="judul" placeholder="Universitas"
                value="{{ old('judul') }}">
        </div>

        <div class="form-group">
            <label for="info_1" class="form-label">Fakultas</label>
            <input type="text" class="form-control form-control-sm" name="info_1" id="info_1" placeholder="Fakultas"
                value="{{ old('info_1') }}">
        </div>

        <div class="form-group">
            <label for="info_2" class="form-label">Prodi</label>
            <input type="text" class="form-control form-control-sm" name="info_2" id="info_2" placeholder="Prodi"
                value="{{ old('info_2') }}">
        </div>

        <div class="form-group">
            <label for="info_3" class="form-label">IPK</label>
            <input type="text" class="form-control form-control-sm" name="info_3" id="info_3" placeholder="IPK"
                value="{{ old('info_3') }}">
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-auto">Tanggal Mulai</div>
                <div class="col-auto">
                    <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control form-control-sm"
                        placeholder="dd/mm/yyyy" value="{{ old('tgl_mulai') }}">
                </div>
                <div class="col-auto">Tanggal Akhir</div>
                <div class="col-auto">
                    <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control form-control-sm"
                        placeholder="dd/mm/yyyy" value="{{ old('tgl_akhir') }}">
                </div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
@endsection
