<?php

namespace App\Http\Controllers;

use App\Models\AcaoMarketing;
use App\Models\TipoAcao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AcaoMarketingController extends Controller
{

    public function index()
    {
        $acoes = AcaoMarketing::with('tipoAcao')->get();
        $tiposAcao = TipoAcao::all();

        return view('marketing', compact('acoes', 'tiposAcao'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'codigo_acao' => 'required|exists:tipo_acao,codigo_acao',
            'data_prevista' => 'required|date|after:today',
            'investimento' => 'required|numeric|min:0',
        ]);

        Log::info('Dados recebidos no store:', $request->all());

        AcaoMarketing::create([
            'codigo_acao' => $request->codigo_acao,
            'data_prevista' => date('Y-m-d', strtotime(str_replace('/', '-', $request->data_prevista))),
            'investimento' => $request->investimento,
            'data_cadastro' => now(),
        ]);

        return redirect()->route('acoes.index');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required|exists:tipo_acao,codigo_acao',
            'data_prevista' => 'required|date',
            'investimento' => 'required|numeric|min:0',
        ]);

        $acao = AcaoMarketing::findOrFail($id);
        $acao->update([
            'codigo_acao' => $request->tipo,
            'data_prevista' => date('Y-m-d', strtotime(str_replace('/', '-', $request->data_prevista))),
            'investimento' => $request->investimento
        ]);

        return response()->json([
            'success' => true,
            'tipo' => $acao->tipoAcao->nome_acao,
            'data_prevista' => date('d/m/Y', strtotime($acao->data_prevista)),
            'investimento' => number_format($acao->investimento, 2, ',', '.')
        ]);
    }
    public function destroy(string $id)
    {
        AcaoMarketing::destroy($id);
        return response()->json(null, 204);
    }
}
