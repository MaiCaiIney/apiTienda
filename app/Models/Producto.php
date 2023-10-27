<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'imagen',
        'descripcion',
        'categoria_id',
        'activo'
    ];

    protected $hidden = [
        'categoria_id',
        'activo',
        'created_at',
        'updated_at'
    ];

    protected $with = [
        'categoria'
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

}
