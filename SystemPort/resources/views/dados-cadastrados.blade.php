@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endsection

@extends('adminlte::page')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="table-responsive">
            <h2>Cadastros</h2>
            <table id="tableDados" class="table table-striped table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>NOME</th>
                        <th>EMPRESA</th>
                        <th>CNPJ</th>
                        <th>CPF/RG</th>
                        <th>VEIULO</th>
                        <th>PLACA</th>
                        <th>MOTORISTA</th>
                        <th>TRANSPORTADORA</th>
                        <th>REGISTRAR</th>
                        <!-- Adicione mais colunas conforme necessário -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dadosCadastrados as $dado)
                        <tr>
                            <td>{{ $dado->nome }}</td>
                            <td>{{ $dado->empresa }}</td>
                            <td>{{ $dado->cnpj }}</td>
                            <td>{{ $dado->cpf }}</td>
                            <td>{{ $dado->veiculo }}</td>
                            <td>{{ $dado->placa }}</td>
                            <td>{{ $dado->motorista }}</td>
                            <td>{{ $dado->transportadora }}</td>
                            <td><a href="{{ route('RegistrarVisita', $dado->id) }}" class="btn btn-primary">Registrar</a></td>
                            <!-- Adicione mais colunas conforme necessário -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#tableDados');
    </script>
@endsection

