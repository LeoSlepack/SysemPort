@extends('adminlte::page')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="text-center mb-4">Cadastro Portaria Betel</h2>
                    <!-- Exibindo o nome da pessoa -->
                    <p>NOME: {{ $dado->nome }}</p>
                    <!-- Formulário -->
                    <form method="POST" action="{{ url('/salvarVisita') }}">
                        @csrf
                        <!-- Campo oculto para o ID -->
                        <input type="hidden" name="dado_id" value="{{ $dado->id }}">
                        <!-- Campo oculto para o nome da pessoa -->
                        <input type="hidden" name="nome_pessoa" value="{{ $dado->nome }}">
                        <!-- Campo Tipo de Visita -->
                        <div class="mb-3">
                            <label for="tipVisita" class="form-label">TIPO DE VISITA</label>
                            <select class="form-select" id="tipVisita" name="tipVisita" required>
                                <option value="">Selecione o tipo de visita</option>
                                <option value="Visita">Visita</option>
                                <option value="Serviço">Serviço</option>
                                <option value="Entrega">Entrega</option>
                                <option value="Busca">Recolhimento</option>
                            </select>
                        </div>
                         <!-- Campo Responsável -->
                        <div class="mb-3">
                            <label for="responsavel" class="form-label">RESPONSÁVEL</label>
                            <input type="text" class="form-control" id="responsavel" name="responsavel" required>
                        </div>
                        <div class="mb-3">
                            <label for="autorizado" class="form-label">AUTORIZADO POR:</label>
                            <input type="text" class="form-control" id="autorizado" name="autorizado" required>
                        </div>
                        <input type="hidden" name="status" value="aberto">
                        <!-- Botão de Envio -->
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
