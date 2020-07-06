@extends('layouts.main')

@section('title')
    Daftar Transaksi Buku Page  
@endsection

@section('container')

<div class="container">
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-lg my-4"> Tambah Data Transaksi</a>
    @if (session('status'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="close">×</button>
            {{ session('status') }}
        </div>
    @endif
    <div class="container border rounded col-lg-30">
        <div class="my-4">
            <table id="example" class="table table-striped table-bordered" style="width: 100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $trk)
                        <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>{{$trk->anggota->nama_anggota}}</td>
                           <td>{{$trk->buku->judul}}</td>
                           <td>{{ date('d/m/y', strtotime($trk->tgl_pinjam)) }}</td>
                           <td>{{ date('d/m/y', strtotime($trk->tgl_kembali)) }}</td>
                           <td>
                                @if ($trk->status == 'dipinjam')
                                    <label class="badge badge-warning">Dipinjam</label>
                                @else
                                    <label class="badge badge-success">Sudah Kembali</label>
                                @endif
                           </td>
                           <td>
                               @if ($trk->status == 'dipinjam')
                                    <form action="{{ route('transaksi.update', $trk->id) }}" class="d-inline" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('put') }}
                                        <button type="submit" class="btn btn-success btn-sm">Sudah Kembali</button>
                                    </form>
                               @endif
                                <form action="{{ route('transaksi.destroy', $trk->id) }}" class="d-inline" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                           </td>
                        </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection