@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>
    </div>
    <div>
        <form action="{{ route('produto.index') }}" method="get">
            <input type="text" name="pesquisar" id="pesquisar" placeholder="Pesquise pelo nome">
            <button>Pesquisar</button>
            <a type="button" href="{{route('produto.create')}}" class="btn btn-success float-end">Incluir produto</a>
        </form>

        <div class="table-responsive small">
            @if ($find->isEmpty())
                <p>Sem dados...</p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($find as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ 'R$' . ' ' . number_format($item->price, 2, ',', '.') }}</td>
                                <td>
                                    <a href="{{route("produto.update", $item->id)}}" class="btn btn-light btn-sm">Editar</a>
                                    <meta name="csrf-token" content="{{csrf_token()}}">
                                    <a href="#" onclick="deletePaginationRegistry('{{route('produto.delete')}}', {{$item->id}})" class="btn btn-danger btn-sm">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
