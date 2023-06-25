@extends('admin.layout')

@section('content')
    <p class="card-title col">Education</p>
    <a href="{{ route('education.create') }}" class="btn btn-primary">+ Education</a>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="">Universitas</th>
                    <th class="">Fakultas</th>
                    <th class="">Jurusan</th>
                    <th class="">IPK</th>
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
                        <td>{{ $item->info_2 }}</td>
                        <td>{{ $item->info_3 }}</td>
                        <td>{{ $item->tgl_mulai_id }}</td>
                        <td>{{ $item->tgl_akhir_id }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah yakin ingin menghapus data ini?')"
                                action="{{ route('education.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('education.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
