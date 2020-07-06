@extends('layouts.main')

@section('title')
    Daftar Anggota Page  
@endsection

@section('container')

<div class="container">
    <a href="{{ route('anggota.create') }}" class="btn btn-primary btn-lg my-4"> Tambah Data Anggota</a>
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
                        <th>Nama Anggota</th>
                        <th>Nomer Induk Konoha</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggota as $agt)
                        <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>
                               <a href="{{route('anggota.show', $agt->id)}}">
                                {{ $agt->nama_anggota }}
                               </a>
                           </td>
                           <td>{{$agt->nik}}</td>
                           <td>
                                <a href="{{ route('anggota.edit', $agt->id) }}" class="btn btn-warning"><i class='far fa-file-alt'></i>Edit</a>
                                <form action="{{ route('anggota.destroy', $agt->id) }}" class="d-inline" method="post">
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
                        <th>Nama Anggota</th>
                        <th>Nomer Induk Konoha</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection