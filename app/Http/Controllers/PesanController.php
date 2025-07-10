<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index(Request $request)
    {
        $jadwal = null;

        if ($request->has('jadwal_id')) {
            $jadwal = \App\Models\Jadwal::find($request->jadwal_id);
        }

        $jadwals = \App\Models\Jadwal::all();

        return view('pesan', compact('jadwal', 'jadwals'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'asal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'penumpang' => 'required|integer|min:1|max:10',
            'catatan' => 'nullable|string',
            'jadwal_id' => 'required|exists:jadwals,id',
        ]);

        // Tambahkan user_id yang sedang login
        $validated['user_id'] = auth()->id();
        // Simpan ke database
        $pemesanan = \App\Models\Pesan::create($validated);

        return redirect()->route('eticket', $pemesanan->id);
    }
}
