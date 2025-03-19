<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAcao extends Model
{
    use HasFactory;

    protected $table = 'tipo_acao';

    protected $primaryKey = 'codigo_acao';

    public $incrementing = true;
    protected $fillable = ['nome_acao'];

    public function acoes()
    {
        return $this->hasMany(AcaoMarketing::class, 'codigo_acao', 'codigo_acao');
    }
}

