@extends('layouts.main')
@section('title')
    Tambah Karyawan
@endsection
@section('content')

    <div class="form-container">
        <h2>Tambah Karyawan</h2>
        <form action="{{ route('karyawan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama karyawan:</label>
                <input type="text" name="nama_karyawan" required>
            </div>
            <div class="form-group">
                <label>Bidang keahlian:</label>
                <input type="text" name="bidang_keahlian" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>No telepon:</label>
                <input type="text" name="nomor_telepon">
            </div>
            <div class="form-group">
                <label>Tanggal mulai:</label>
                <input type="date" name="tanggal_mulai">
            </div>

            <div class="form-group">
                <label>Durasi kontrak (dalam bulan):</label>
                <input type="number" name="durasi_kontrak" id="durasi_kontrak" required>
            </div>

            <div class="form-group">
                <label>Status:</label>
                <select name="status" id="status" required>
                    <option value="aktif">Aktif</option>
                    <option value="tidak_aktif">Tidak aktif</option>
                </select>
            </div>

            <button type="submit">Simpan</button>
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