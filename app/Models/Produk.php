<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'packages';
    protected $primaryKey = 'id';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
