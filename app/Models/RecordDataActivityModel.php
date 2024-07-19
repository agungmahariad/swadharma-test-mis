<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordDataActivityModel extends Model
{
    use HasFactory;

    protected $connection = 'mysql2'; // Koneksi ke database penampungan
    protected $table = 'record_data_activity'; // Nama tabel

    protected $fillable = [
        'batch',
        'send_date',
        'amount_data',
        'send_status',
    ];
}
