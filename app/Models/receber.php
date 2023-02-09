<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receber extends Model
{
    use HasFactory;
    protected $fillable = ['data', 'empresa_id', 'valor', 'adicional', 'total', 'observacao'];
    public function empresa()
    {
        return $this->hasOne(Empresa::class, 'id', 'empresa_id');
    }        
}
