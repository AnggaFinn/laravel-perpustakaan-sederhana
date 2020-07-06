<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'tb_transactions';
    protected $fillable = ['anggota_id', 'buku_id', 'tgl_pinjam', 'tgl_kembali', 'status'];

    public function anggota()
    {
    	return $this->belongsTo(Member::class);
    }

    public function buku()
    {
    	return $this->belongsTo(Book::class);
    }
}
