<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LOBSecondModel extends Model
{
   use HasFactory;

   protected $connection = 'mysql2'; // Koneksi ke database penampungan
   protected $table = 'lob'; // Nama tabel

   protected $fillable = [
      'lob',
      'claim_reason',
      'amount_of_customer',
      'load_value',
      'periode',
      'send_date'
   ];
}
