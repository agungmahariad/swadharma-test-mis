<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LOBModel extends Model
{
   use HasFactory;

   protected $table = 'lob';
   
   protected $fillable = [
      'lob',
      'claim_reason',
      'amount_of_customer',
      'load_value',
      'periode',
      'sended'
   ];
}
