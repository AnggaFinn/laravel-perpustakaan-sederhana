@extends('layouts/main')

@section('title')
    Edit Pustaka 
@endsection

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="jumbotron">
                <h2 class="display-5">Detail Buku <b>{{ $anggota->nama_anggota }}</b></h2>
                <hr>
                
                    <div class="form-group">
                        <label for="judul">Nama Anggota:</label>
                        <input type="text" class="form-control" id="nama" name="nama_anggota" value="{{$anggota->nama_anggota}}" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="nik">Nomer Induk Konoha:</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{$anggota->nik}}" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor Handphone:</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" value="{{$anggota->no_hp}}" readonly="">
                    </div>
                    <a href="{{ route('anggota.index') }}" class="btn btn-primary">Kembali</a>
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