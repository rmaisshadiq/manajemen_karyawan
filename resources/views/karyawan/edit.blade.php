@extends('layouts.main')
@section('title')
    Edit Karyawan
@endsection
@section('content')

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <div class="form-container">
        <h2>Edit Karyawan</h2>
        <form action="{{ route('karyawan.update', $customers->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama karyawan:</label>
                <input type="text" name="nama_karyawan" id="nama_karyawan" value="{{ $customers->nama_karyawan }}" required>
            </div>
            <div class="form-group">
                <label>Bidang keahlian:</label>
                <input type="text" name="bidang_keahlian" id="bidang_keahlian" value="{{ $customers->bidang_keahlian }}" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" id="email" value="{{ $customers->email }}" required>
            </div>

            <div class="form-group">
                <label>No telepon:</label>
                <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ $customers->nomor_telepon }}" required>
            </div>
            <div class="form-group">
                <label>Tanggal mulai:</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ $customers->tanggal_mulai }} required">
            </div>

            <div class="form-group">
                <label>Durasi kontrak (dalam bulan):</label>
                <input type="number" name="durasi_kontrak" id="durasi_kontrak" value="{{ $customers->durasi_kontrak }}"
                    required>
            </div>

            <div class="form-group">
                <label>Status:</label>
                <select name="status" id="status" required>
                    @if ($customers->durasi_kontrak == 0)
                        <option value="selesai" selected>Selesai</option>
                    @else
                        <option value="active" {{ $customers->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="suspended" {{ $customers->status == 'tidak_aktif' ? 'selected' : '' }}>Tidak aktif</option>
                    @endif
                </select>
            </div>

            <button type="submit">Update</button>
        </form>

        <script>
            const contractDurationInput = document.getElementById('durasi_kontrak');
            const statusSelect = document.getElementById('status');

            contractDurationInput.addEventListener('input', function () {
                const duration = parseInt(this.value);

                // Clear the current options
                statusSelect.innerHTML = '';

                if (duration === 0) {
                    const option = document.createElement('option');
                    option.value = 'selesai';
                    option.textContent = 'Selesai';
                    statusSelect.appendChild(option);
                } else {
                    // Allow "active" and "suspended"
                    const activeOption = document.createElement('option');
                    activeOption.value = 'aktif';
                    activeOption.textContent = 'Aktif';

                    const suspendedOption = document.createElement('option');
                    suspendedOption.value = 'tidak_aktif';
                    suspendedOption.textContent = 'Tidak aktif';

                    statusSelect.appendChild(activeOption);
                    statusSelect.appendChild(suspendedOption);
                }
            });
        </script>
    </div>

@endsection