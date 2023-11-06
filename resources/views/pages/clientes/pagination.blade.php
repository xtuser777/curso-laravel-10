@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
    </div>
    <div>
        <form action="{{ route('cliente.index') }}" method="get">
            <input type="text" name="pesquisar" id="pesquisar" placeholder="Pesquise pelo nome">
            <button>Pesquisar</button>
            <a type="button" href="{{route('cliente.create')}}" class="btn btn-success float-end">Incluir cliente</a>
        </form>

        <div class="table-responsive small">
            @if ($find->isEmpty())
                <p>Sem dados...</p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Endereço</th>
                            <th>Logradouro</th>
                            <th>CEP</th>
                            <th>Bairro</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($find as $item)
                            <tr>
                                <td>{{ $item->nome }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->endereco }}</td>
                                <td>{{ $item->logradouro }}</td>
                                <td>{{ $item->cep }}</td>
                                <td>{{ $item->bairro }}</td>
                                <td>
                                    <a href="{{route("cliente.update", $item->id)}}" class="btn btn-light btn-sm">Editar</a>
                                    <meta name="csrf-token" content="{{csrf_token()}}">
                                    <a href="#" onclick="deletePaginationRegistry('{{route('cliente.delete')}}', {{$item->id}})" class="btn btn-danger btn-sm">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
