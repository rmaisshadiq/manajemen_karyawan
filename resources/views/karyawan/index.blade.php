@extends('layouts.main')

@section('title', 'Data Karyawan')

@section('content')
<h1>Data karyawan</h1>
    <a href="{{ route('karyawan.create') }}" class="btn btn-primary">Tambah Karyawan</a>
    <a href="{{ route('karyawan.trash') }}" class="btn btn-secondary">Karyawan Terhapus</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Bidang Keahlian</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Tanggal Mulai</th>
                    <th>Durasi Kontrak</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $ctm)
                    <tr>
                        <td>{{ $ctm->nama_karyawan }}</td>
                        <td>{{ $ctm->bidang_keahlian }}</td>
                        <td>{{ $ctm->email }}</td>
                        <td>{{ $ctm->nomor_telepon }}</td>
                        <td>{{ $ctm->tanggal_mulai }}</td>
                        <td>{{ $ctm->durasi_kontrak }}</td>
                        <td>{{ $ctm->status }}</td>
                        <td>
                            <a href="{{ route('karyawan.edit', $ctm->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                            <form action="{{ route('karyawan.destroy', $ctm->id) }}" method="POST"
                                style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination-container d-flex justify-content-center mt-4">
            {{$customers->links('pagination::bootstrap-5')}}
        </div>
    </div>
@endsection