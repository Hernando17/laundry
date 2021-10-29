<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'transaction_details';
    protected $primaryKey = 'id';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
