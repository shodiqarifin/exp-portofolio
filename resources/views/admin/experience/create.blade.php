@extends('admin.layout')

@section('content')
    <div class="pb-3">
        <a href="{{ route('experience.index') }}">Experience</a> / Tambah
    </div>
    <form action="{{ route('experience.store') }}" method="post">
        @csrf
        @method('post')

        <div class="form-group">
            <label for="judul" class="form-label">Posisi</label>
            <input type="text" class="form-control form-control-sm" name="judul" id="judul" placeholder="Posisi"
                value="{{ old('judul') }}">
        </div>

        <div class="form-group">
            <label for="info_1" class="form-label">Perusahaan</label>
            <input type="text" class="form-control form-control-sm" name="info_1" id="info_1"
                placeholder="Nama Perusahaan" value="{{ old('info_1') }}">
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

        <div class="form-group">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" id="isi" rows="10" class="form-control summernote" placeholder="Isi">{{ old('isi') }}</textarea>
        </div>

        <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300
            });
        });
    </script>
@endpush
