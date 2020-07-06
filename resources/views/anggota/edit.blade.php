@extends('layouts/main')

@section('title')
    Edit Anggota 
@endsection

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="jumbotron">
                <h1 class="display-4">This is Form Edit Anggota Page</h1>
                <hr>
                <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" class="needs-validation" novalidate>
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="form-group">
                        <label for="nama_anggota">Nama Anggota:</label>
                        <input type="text" class="form-control" id="nama_anggota" placeholder="Masukan nama anggota..." name="nama_anggota" value="{{$anggota->nama_anggota}}" required>
                        <div class="valid-feedback">Sip!</div>
                        <div class="invalid-feedback">Mohon mengisi username.</div>
                    </div>
                    <div class="form-group">
                        <label for="nik">Nomer Induk Konoha:</label>
                        <input type="text" class="form-control" id="nik" placeholder="Masukan nomor induk konoha..." name="nik" value="{{$anggota->nik}}" required>
                        <div class="valid-feedback">Sip!</div>
                        <div class="invalid-feedback">Mohon mengisi nomer induk konoha dattebayo.</div>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor Handphone:</label>
                        <input type="number" class="form-control" id="no_hp" placeholder="Masukan tahun terbit..." name="no_hp" value="{{$anggota->no_hp}}" required>
                        <div class="valid-feedback">Sip!</div>
                        <div class="invalid-feedback">Mohon untuk mengisi nomor hp dattebayo.</div>
                    </div>
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('anggota.index') }}">Kembali</a>
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