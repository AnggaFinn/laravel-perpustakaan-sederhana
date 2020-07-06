<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Book;
use App\Member;
use App\Transaction;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaction::all();

        return view('transaksi.index', ['transaksi'=> $transaksi]);
    }

    public function create()
    {
        $book = Book::where('stok', '>', 0)->get();
        $anggota = Member::get();

        return view('transaksi.create', ['book' => $book, 'anggota' => $anggota]);
    }

    public function store(Request $request)
    {
        $transaksi = new Transaction();

        $transaksi->buku_id = $request['buku_id'];
        $transaksi->anggota_id = $request['anggota_id'];
        $transaksi->tgl_pinjam = $request['tgl_pinjam'];
        $transaksi->tgl_kembali = $request['tgl_kembali'];
        $transaksi->save();

        $transaksi->buku->where('id', $transaksi->buku_id)->update(['stok' => ($transaksi->buku->stok - 1),]);

        return redirect()->route('transaksi.index')->with('status', 'Data Transaksi Berhasil di Tambahkan!');
    }

    public function show($id)
    {
        $transaksi = Transaction::findOrFail($id);

        return view('transaksi.show', ['transaksi'=>$transaksi]);
    }

    public function edit($id)
    {
        $transaksi = Transaction::findOrFail($id);

        return view('transaksi.edit', ['transaksi'=>$transaksi]);
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaction::find($id);

        $transaksi->update(['status'=>'sudah kembali']);

        $transaksi->buku->where('id', $transaksi->buku_id)->update(['stok' => ($transaksi->buku->stok + 1),]);

        return redirect()->route('transaksi.index')->with('status', 'Data Transaksi Berhasil di Ubah!');
    }

    public function destroy($id)
    {
        Transaction::find($id)->delete();
        
        return redirect()->route('transaksi.index')->with('status', 'Data Transaksi Berhasil di Hapus!');
    }
}
