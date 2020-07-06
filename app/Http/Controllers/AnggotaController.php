<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Member::all();

        return view('anggota.index', ['anggota'=> $anggota]);
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $anggota = new Member();

        $anggota->nama_anggota = $request['nama_anggota'];
        $anggota->nik = $request['nik'];
        $anggota->no_hp = $request['no_hp'];
        $anggota->save();

        return redirect()->route('anggota.index')->with('status', 'Data Anggota Berhasil di Tambahkan!');
    }

    public function show($id)
    {
        $anggota = Member::findOrFail($id);

        return view('anggota.show', ['anggota'=>$anggota]);
    }

    public function edit($id)
    {
        $anggota = Member::findOrFail($id);

        return view('anggota.edit', ['anggota'=>$anggota]);
    }

    public function update(Request $request, $id)
    {
        $anggota = Member::find($id);

        $anggota->nama_anggota = $request['nama_anggota'];
        $anggota->nik = $request['nik'];
        $anggota->no_hp = $request['no_hp'];
        $anggota->save();

        return redirect()->route('anggota.index')->with('status', 'Data Anggota Berhasil di Update!');
    }

    public function destroy($id)
    {
        Member::find($id)->delete();
        
        return redirect()->route('anggota.index')->with('status', 'Data Anggota Berhasil di Hapus!');
    }
}
