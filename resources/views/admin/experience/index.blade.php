@extends('admin.layout')

@section('content')
    <p class="card-title col">Experience</p>
    <a href="{{ route('experience.create') }}" class="btn btn-primary">+ Experience</a>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="">Posisi</th>
                    <th class="">Perusahaan</th>
                    <th class="">Tanggal Mulai</th>
                    <th class="">Tanggal Akhir</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->info_1 }}</td>
                        <td>{{ $item->tgl_mulai_id }}</td>
                        <td>{{ $item->tgl_akhir_id }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah yakin ingin menghapus data ini?')"
                                action="{{ route('experience.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('experience.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
