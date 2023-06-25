@extends('admin.layout')

@section('content')
    <div class="pb-3">
        <a href="{{ route('halaman.create') }}">Halaman</a> / Edit
    </div>
    <form action="{{ route('halaman.update', $data->id) }}" method="post">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control form-control-sm" name="judul" id="judul" placeholder="Judul"
                value="{{ old('judul') ?? $data->judul }}">
        </div>

        <div class="form-group">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" id="isi" rows="10" class="form-control summernote" placeholder="Isi">{{ old('isi') ?? $data->isi }}</textarea>
        </div>

        <button class="btn btn-primary" type="submit">Ubah</button>
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
