@extends('layouts/main')

@section('title')
    Input Transaksi 
@endsection

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="jumbotron">
                <h1 class="display-4">This is Form Transaksi Page</h1>
                <hr>
                <form action="{{ route('transaksi.store') }}" method="POST" class="needs-validation" novalidate>
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nama_peminjam">Nama Peminjam:</label>
                        
                            <div class="input-group">
                                <input id="anggota_nama" type="text" class="form-control" readonly="" required>
                                <input id="anggota_id" type="hidden" name="anggota_id" value="{{ old('anggota_id') }}" required>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Anggota</b></button>
                                </span>
                                <div class="valid-feedback">Sip!</div>
                                <div class="invalid-feedback">Mohon mengisi nama peminjam dattebayo.</div>
                            </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="buku_id" class="col-md-4 control-label">Judul Buku</label>
                        
                            <div class="input-group">
                                <input id="buku_judul" type="text" class="form-control" readonly="" required>
                                <input id="buku_id" type="hidden" name="buku_id" value="{{ old('buku_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Buku</b> <span class="fa fa-search"></span></button>
                                </span>
                                <div class="valid-feedback">Sip!</div>
                                <div class="invalid-feedback">Mohon mengisi judul buku dattebayo.</div>
                            </div>
                        
                    <div class="form-group">
                      <label for="tgl_pinjam">Tanggal Pinjam:</label>
                      <input type="date" class="form-control" id="tgl_pinjam" placeholder="Masukan tanggal pinjam..." name="tgl_pinjam" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required readonly>
                      <div class="valid-feedback">Sip!</div>
                      <div class="invalid-feedback">Mohon untuk mengisi tanggal pinjam dattebayo.</div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_kembali">Tanggal Kembali:</label>
                        <input type="date" class="form-control" id="tgl_kembali" placeholder="Masukan tanggal kembali..." name="tgl_kembali" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->addDays(7)->toDateString())) }}" required readonly>
                        <div class="valid-feedback">Sip!</div>
                        <div class="invalid-feedback">Mohon untuk mengisi tanggal kembali dattebayo.</div>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('transaksi.index') }}">Kembali</a>
                </form>


        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg" role="document" >
              <div class="modal-content" style="background: #fff;">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cari Buku</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                                  <table id="lookup" class="table table-bordered table-hover table-striped">
                                      <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Judul Buku</th>
                                            <th>Penulis</th>
                                            <th>Stok Buku</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach($book as $bk)
                                                <tr class="pilih" data-buku_id="{{$bk->id}}" data-buku_judul="{{$bk->judul}}">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$bk->judul}}</td>
                                                    <td>{{$bk->penulis}}</td>
                                                    <td>{{$bk->stok}}</td>
                                                </tr>
                                          @endforeach
                                      </tbody>
                                  </table>  
                              </div>
                          </div>
                      </div>
                  </div>
          

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg" role="document" >
              <div class="modal-content" style="background: #fff;">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cari Anggota</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                                  <table id="lookup" class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Anggota</th>
                                                <th>Nomer Induk Konoha</th>
                                            </tr>
                                        </thead>
                                      <tbody>
                                            @foreach ($anggota as $agt)
                                                <tr class="pilih_anggota" data-anggota_id="{{$agt->id}}" data-anggota_nama="{{$agt->nama_anggota}}" >
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$agt->nama_anggota}}</td>
                                                    <td>{{$agt->nik}}</td>
                                                </tr>
                                            @endforeach
                                      </tbody>
                                  </table>  
                              </div>
                          </div>
                      </div>
                  </div>



                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                      'use strict';
                      window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                          form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                              event.preventDefault();
                              event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                          }, false);
                        });
                      }, false);
                    })();
                </script>

            </div>
        </div>
    </div>
</div>

@endsection