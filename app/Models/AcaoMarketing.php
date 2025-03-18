<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcaoMarketing extends Model
{
    use HasFactory;

    protected $table = 'acao_marketings';

    protected $fillable = [
        'tipo',
        'data_prevista',
        'investimento'
    ];
}
