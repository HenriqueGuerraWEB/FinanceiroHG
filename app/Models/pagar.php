<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagar extends Model
{
    use HasFactory;
    protected $fillable = ['data', 'empresa', 'valor', 'observacao'];
}
