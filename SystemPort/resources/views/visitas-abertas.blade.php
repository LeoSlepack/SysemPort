@extends('adminlte::page')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="text-center mb-4">Visitas em Aberto</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tipo de Visita</th>
                                    <th>Responsável</th>
                                    <th>Entrada autorizada por:</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visitasAbertas as $visita)
                                <tr>
                                    <td>{{ $visita->id }}</td>
                                    <td>{{ $visita->tipVisita }}</td>
                                    <td>{{ $visita->responsavel }}</td>
                                    <td>{{ $visita->autorizado }}</td>
                                    <td>
                                        <form action="{{ route('encerrarVisita', $visita->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Encerrar Visita</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
