<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portaria;
use App\Models\Visit;

class PortariaController extends Controller
{
    public function index()
    {
        // Retorne a view, passando a variável $visit para ela
        return view('home', compact('visit'));
    }

    public function salvar(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required',
            'empresa' => 'required',
            'cnpj' => 'required',
            'cpf' => 'required',
            'transportadora' => 'required',
            'veiculo' => 'required',
            'placa' => 'required',
            'motorista' => 'required',
        ]);

        // Cria uma nova instância do modelo Portaria
        $portaria = new Portaria();

        // Atribui os valores do formulário ao modelo
        $portaria->nome = $request->nome;
        $portaria->empresa = $request->empresa;
        $portaria->cnpj = $request->cnpj;
        $portaria->cpf = $request->cpf;
        $portaria->transportadora = $request->transportadora;
        $portaria->veiculo = $request->veiculo;
        $portaria->placa = $request->placa;
        $portaria->motorista = $request->motorista;

        // Salva os dados no banco de dados
        $portaria->save();

        // Supondo que você queira buscar a última visita registrada, você pode fazer algo assim:
        $visit = Visit::latest()->first(); // Isso busca a última visita registrada


        // Redireciona para uma página de confirmação ou outra ação
        return redirect('dados-cadastrados')->with('success', 'Portaria cadastrada com sucesso!');
    }

    public function mostrarDadosCadastrados()
    {
        $dadosCadastrados = Portaria::all(); // Substitua "Modelo" pelo nome do seu modelo

        return view('dados-cadastrados', ['dadosCadastrados' => $dadosCadastrados]);
    }

    public function RegistrarVisita($id)
    {
        // Aqui você deve buscar os detalhes do dado pelo $id, por exemplo:
        $dado = Portaria::findOrFail($id);

        // Retorne a view com os dados necessários
        return view('registrarVisita', compact('dado'));
    }


    public function salvarVisita(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'tipVisita' => 'required',
            'responsavel' => 'required',
            'autorizado' => 'required',
            'dado_id' => 'required|exists:portarias,id', // Verifica se o dado_id existe na tabela 'portarias'
            'nome_pessoa' => 'required', // Certifique-se de que 'nome_pessoa' é requerido conforme necessário
            'status' => 'required', // Certifique-se de que 'status' é requerido conforme necessário
        ]);

        // Criar uma nova instância do modelo Visit
        $visit = new Visit();

        // Atribuir os valores do formulário ao modelo
        $visit->tipVisita = $request->input('tipVisita');
        $visit->responsavel = $request->input('responsavel');
        $visit->autorizado = $request->input('autorizado');
        $visit->status = $request->input('status');

        // Associar o nome da pessoa ao registro da visita
        $visit->nome_pessoa = $request->input('nome_pessoa');

        // Associar o dado_id ao registro da visita
        $visit->dado_id = $request->input('dado_id');

        // Salvar os dados no banco de dados
        $visit->save();

        // Redirecionar para uma página de confirmação ou outra ação
        return redirect()->route('visitas.abertas');
    }




    public function concluirVisita($id)
    {
        $visit = Visit::find($id);
        if (!$visit) {
            return redirect()->back()->with('error', 'Visita não encontrada.');
        }

        // Atualizar o status da visita para 'concluído'
        $visit->status = 'concluído';
        $visit->save();

        return redirect()->back()->with('success', 'Visita marcada como concluída.');
    }

    public function visitasAbertas()
    {
        $visitasAbertas = Visit::where('status', 'aberto')->get();

        return view('visitas-abertas', compact('visitasAbertas'));
    }

    public function encerrarVisita($id)
    {
        // Encontre a visita pelo ID
        $visit = Visit::findOrFail($id);

        // Verifique se a visita está aberta
        if ($visit->status === 'aberto') {
            // Atualize o status para 'concluído' e salve a hora de encerramento
            $visit->status = 'concluído';
            $visit->hora_encerramento = now(); // Adapte para o formato de data/hora do seu banco de dados

            // Salve as alterações
            $visit->save();

            return redirect()->back()->with('success', 'Visita encerrada com sucesso.');
        }

        return redirect()->back()->with('error', 'Esta visita já foi encerrada.');
    }



}
