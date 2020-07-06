@extends('layouts.main')

@section('title')
    Daftar Buku Page  
@endsection

@section('container')

<div class="container">
    <a href="{{ route('book.create') }}" class="btn btn-primary btn-lg my-4"> Tambah Data Buku</a>
    @if (session('status'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="close">×</button>
            {{ session('status') }}
        </div>
    @endif
    <div class="container border rounded mt-2">
        <div class="my-4">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Stok Buku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book as $bk)
                        <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>
                               <a href="{{route('book.show', $bk->id)}}">
                                {{ $bk->judul }}
                               </a>
                           </td>
                           <td>{{$bk->penulis}}</td>
                           <td>{{$bk->stok}}</td>
                           <td>
                                <a href="{{ route('book.edit', $bk->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('book.destroy', $bk->id) }}" class="d-inline" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                           </td>
                        </tr>
                     @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Stok Buku</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection