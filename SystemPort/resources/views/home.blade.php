@extends('adminlte::page')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="text-center mb-4">Cadastro Portaria Betel</h2>
                    <!-- Formulário -->
                    <form method="POST" action="{{ url('/salvar-portaria') }}">
                        @csrf
                        <!-- Campo Nome -->
                        <div class="mb-3">
                            <label for="nome" class="form-label">NOME</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <!-- Campo Empresa -->
                        <div class="mb-3">
                            <label for="empresa" class="form-label">EMPRESA</label>
                            <input type="text" class="form-control" id="empresa" name="empresa" required>
                        </div>
                        <!-- Campo Transportadora -->
                        <div class="mb-3">
                            <label for="transportadora" class="form-label">TRANSPORTADORA</label>
                            <input type="text" class="form-control" id="transportadora" name="transportadora" required>
                        </div>
                        <!-- Campo Veiculo -->
                        <div class="mb-3">
                            <label for="veiculo" class="form-label">VEICULO</label>
                            <input type="text" class="form-control" id="veiculo" name="veiculo" required>
                        </div>
                        <!-- Campo Placa -->
                        <div class="mb-3">
                            <label for="placa" class="form-label">PLACA</label>
                            <input type="text" class="form-control" id="placa" name="placa" required>
                        </div>
                        <!-- Campo Motorista -->
                        <div class="mb-3">
                            <label for="motorista" class="form-label">MOTORISTA</label>
                            <input type="text" class="form-control" id="motorista" name="motorista" required>
                        </div>
                        <!-- Campo CNPJ -->
                        <div class="mb-3">
                            <label for="cnpj" class="form-label">CNPJ</label>
                            <input type="text" class="form-control" id="cnpj" name="cnpj" required>
                        </div>
                        <!-- Campo CPF -->
                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF/RG</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" required>
                        </div>
                        <!-- Botão de Envio -->
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
