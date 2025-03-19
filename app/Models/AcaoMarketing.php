<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcaoMarketing extends Model
{
    use HasFactory;

    protected $table = 'acao';

    protected $fillable = [
        'codigo_acao',
        'investimento',
        'data_prevista',
        'data_cadastro'
    ];

    public function tipoAcao()
    {
        return $this->belongsTo(TipoAcao::class, 'codigo_acao', 'codigo_acao'); // ✅ Corrigindo a FK e PK
    }
}

