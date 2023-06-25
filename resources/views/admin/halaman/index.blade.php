@extends('admin.layout')

@section('content')
    <p class="card-title col">Halaman</p>
    <a href="{{ route('halaman.create') }}" class="btn btn-primary">+ Halaman</a>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="">Judul</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($halaman as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah yakin ingin menghapus data ini?')"
                                action="{{ route('halaman.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('halaman.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
