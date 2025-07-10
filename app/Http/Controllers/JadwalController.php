<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::latest()->get();
        return view('jadwal', compact('jadwals'));
    }

    public function show($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('detail', compact('jadwal'));
    }
}
