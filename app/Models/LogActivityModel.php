<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivityModel extends Model
{
    use HasFactory;

    protected $connection = 'mysql2'; // Koneksi ke database penampungan
    protected $table = 'log_activity'; // Nama tabel

    protected $fillable = [
        'title',
        'activity_date'
    ];
}
