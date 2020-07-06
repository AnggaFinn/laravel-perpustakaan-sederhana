@extends('layouts/main')

@section('title')
    Input Pustaka 
@endsection

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="jumbotron">
                <h1 class="display-4">This is Form Buku Page</h1>
                <hr>
                <form action="{{ route('book.store') }}" method="POST" class="needs-validation" novalidate>
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="judul">Judul Buku:</label>
                        <input type="text" class="form-control" id="judul" placeholder="Masukan judul buku..." name="judul" required>
                        <div class="valid-feedback">Sip!</div>
                        <div class="invalid-feedback">Mohon mengisi judul buku.</div>
                    </div>
                    <div class="form-group">
                      <label for="penulis">Nama Penulis:</label>
                      <input type="text" class="form-control" id="penulis" placeholder="Masukan nama penulis..." name="penulis" required>
                      <div class="valid-feedback">Sip!</div>
                      <div class="invalid-feedback">Mohon mengisi nama penulis.</div>
                    </div>
                    <div class="form-group">
                      <label for="stok">Tahun Terbit:</label>
                      <input type="number" class="form-control" id="tahun_terbit" placeholder="Masukan tahun terbit..." name="tahun_terbit" required>
                      <div class="valid-feedback">Sip!</div>
                      <div class="invalid-feedback">Mohon untuk mengisi tahun terbit.</div>
                    </div>
                    <div class="form-group">
                        <label for="stok">Jumlah Stok:</label>
                        <input type="number" class="form-control" id="stok" placeholder="Masukan stok..." name="stok" required>
                        <div class="valid-feedback">Sip!</div>
                        <div class="invalid-feedback">Mohon untuk mengisi jumlah stok.</div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <input type="text" class="form-control" id="deskripsi" placeholder="Masukan deskripsi..." name="deskripsi">
                        <div class="valid-feedback">Sip!</div>
                    </div>
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                      <a href="book.index">Kembali</a>
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