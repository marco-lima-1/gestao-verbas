<?php

namespace App\Http\Controllers;

use App\Models\AcaoMarketing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AcaoMarketingController extends Controller
{

    public function index()
    {
        $acoes = AcaoMarketing::all();
        return view('marketing', compact('acoes'));
    }

    public function store(Request $request)
{
    Log::info('Recebendo requisição para criar uma nova ação de marketing', [
        'dados_recebidos' => $request->all()
    ]);

    $request->validate([
        'tipo' => 'required|string',
        'data_prevista' => 'required|regex:/\d{2}\/\d{2}\/\d{4}/',
        'investimento' => 'required|numeric|min:0',
    ]);

    $acao = AcaoMarketing::create([
        'tipo' => $request->tipo,
        'data_prevista' => $request->data_prevista,
        'investimento' => $request->investimento
    ]);

    Log::info('Ação de marketing criada com sucesso', [
        'acao_criada' => $acao
    ]);

    return redirect()->route('acoes.index');
}

public function update(Request $request, $id)
{
    $request->validate([
        'tipo' => 'required|string',
        'data_prevista' => 'required|date|after:today',
        'investimento' => 'required|numeric|min:0',
    ]);

    // Converte DD/MM/YYYY para YYYY-MM-DD antes de salvar no banco
    $dataFormatada = date('Y-m-d', strtotime(str_replace('/', '-', $request->data_prevista)));

    $acao = AcaoMarketing::findOrFail($id);
    $acao->update([
        'tipo' => $request->tipo,
        'data_prevista' => $dataFormatada,
        'investimento' => $request->investimento
    ]);

    return response()->json([
        'tipo' => $acao->tipo,
        'data_prevista' => date('d/m/Y', strtotime($acao->data_prevista)), // Retorna no formato correto
        'investimento' => number_format($acao->investimento, 2, ',', '.')
    ]);
}



    public function destroy(string $id)
    {
        AcaoMarketing::destroy($id);
        return response()->json(null, 204);
    }
}
