@extends('layouts.main')

@section('title', 'Restore Karyawan')

@section('content')
    <h1>Karyawan Terhapus</h1>
    <a href="{{ route('karyawan.index') }}" class="btn btn-primary">Kembali</a>
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
                @foreach ($customers as $ctm)
                    <tr>
                        <td>{{ $ctm->nama_karyawan }}</td>
                        <td>{{ $ctm->bidang_keahlian }}</td>
                        <td>{{ $ctm->email }}</td>
                        <td>{{ $ctm->nomor_telepon }}</td>
                        <td>{{ $ctm->tanggal_mulai }}</td>
                        <td>{{ $ctm->durasi_kontrak }}</td>
                        <td>{{ $ctm->status }}</td>
                        <td>
                            <form action="{{ route('karyawan.restore', $ctm->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit">Restore</button>
                            </form>

                            <form action="{{ route('karyawan.forceDelete', $ctm->id) }}" method="POST"
                                style="margin-top: 5px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: red;">Hapus Permanen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination-container d-flex justify-content-center mt-4">
        {{$customers->links('pagination::bootstrap-5')}}
    </div>
@endsection