<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $book = Book::all();

        return view('book.index', ['book'=> $book]);
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {
        $book = new Book();

        $book->judul = $request['judul'];
        $book->penulis = $request['penulis'];
        $book->tahun_terbit = $request['tahun_terbit'];
        $book->stok = $request['stok'];
        $book->deskripsi = $request['deskripsi'];
        $book->save();

        return redirect()->route('book.index')->with('status', 'Data Buku Berhasil di Tambahkan!');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('book.show', ['book'=>$book]);
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('book.edit', ['book'=>$book]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        $book->judul = $request['judul'];
        $book->penulis = $request['penulis'];
        $book->tahun_terbit = $request['tahun_terbit'];
        $book->stok = $request['stok'];
        $book->deskripsi = $request['deskripsi'];
        $book->save();

        return redirect()->route('book.index')->with('status', 'Data Buku Berhasil di Edit!');
    }

    public function destroy($id)
    {
        Book::find($id)->delete();
        
        return redirect()->route('book.index')->with('status', 'Data Anggota Berhasil di Hapus!');
    }
}
