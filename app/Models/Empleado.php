<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = ['nombres', 'apellidos', 'documento', 'telefono', 'direccion', 'departamento_id', 'user_id'];

    //relación uno a muchos inversa con la tabla departamentos
    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }

    //relación uno a uno con la tabla users
    public function user(){
        return $this->belongsTo(User::class);
    }
}
