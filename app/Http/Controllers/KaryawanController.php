<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    //
    public function index()
    {
        $customers = Karyawan::latest()->paginate(10);
        return view('karyawan.index', compact('customers'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'bidang_keahlian' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:karyawans,email',
            'nomor_telepon' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'durasi_kontrak' => 'required|integer|min:0',
            'status' => 'required|string|max:255',
        ]);

        Karyawan::create($request->all());
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $customers = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('customers'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'bidang_keahlian' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:karyawans,email,' . $id,
            'nomor_telepon' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'durasi_kontrak' => 'required|integer|min:0',
            'status' => 'required|string|max:255',
        ]);

        // if ($request['durasi_kontrak'] == 0) {
        //     $request['status'] = 'selesai';
        // } else {
        //     if (!in_array($request['status'], ['aktif', 'tidak_aktif'])) {
        //         $request['status'] = 'aktif'; // fallback
        //     }
        // }

        $customers = Karyawan::findOrFail($id);
        $customers->update($request->all());
        return redirect()->route('karyawan.index')->with('success', 'Data Karyawan berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $customers = Karyawan::findOrFail($id);
        $customers->delete();
        return redirect()->route('karyawan.index')->with('success', 'Data Karyawan berhasil dihapus');
    }

    public function trash()
    {
        $customers = Karyawan::onlyTrashed()->paginate(10);
        return view('karyawan.trash', compact('customers'));
    }

    public function restore(string $id)
    {
        $customers = Karyawan::onlyTrashed()->where('id', $id)->firstOrFail();
        $customers->restore();

        return redirect()->route('karyawan.trash')->with('success', 'Data Karyawan berhasil dikembalikan.');
    }

    public function forceDelete(string $id)
    {
        $customers = Karyawan::onlyTrashed()->where('id', $id)->firstOrFail();
        $customers->forceDelete();

        return redirect()->route('karyawan.trash')->with('success', 'Data Karyawan telah dihapus permanen.');
    }
}
