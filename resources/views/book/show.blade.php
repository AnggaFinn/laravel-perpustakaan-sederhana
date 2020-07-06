@extends('layouts/main')

@section('title')
    Edit Pustaka 
@endsection

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="jumbotron">
                <h2 class="display-5">Detail Buku <b>{{ $book->judul }}</b></h2>
                <hr>
                
                    <div class="form-group">
                        <label for="judul">Judul Buku:</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukan nama..." name="judul" value="{{$book->judul}}" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="stok">Jumlah Stok:</label>
                        <input type="number" class="form-control" id="stok" placeholder="Masukan stok..." name="stok" value="{{$book->stok}}" readonly="">  
                    </div>
                    <div class="form-group">
                      <label for="nama_penulis">Nama Penulis:</label>
                      <input type="text" class="form-control" id="nama_penulis" placeholder="Masukan nama penulis..." name="nama_penulis" value="{{$book->penulis}}" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="stok">Tahun Terbit:</label>
                      <input type="number" class="form-control" id="tahun_terbit" placeholder="Masukan tahun terbit..." name="tahun_terbit" value="{{$book->tahun_terbit}}" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <input type="text" class="form-control" id="deskripsi" placeholder="Masukan deskripsi..." name="deskripsi" value="{{$book->deskripsi}}" readonly="">
                    </div>
                    <a href="{{ route('book.index') }}" class="btn btn-primary">Kembali</a>
                </form>

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