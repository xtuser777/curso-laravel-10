@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('produto.create') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Criar novo Produto</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"
                name="name">
            @if ($errors->has('name'))
                <div class="invalid-feedback"> {{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Valor</label>
            <input id='mascara_valor' value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror"
                name="price">
            @if ($errors->has('price'))
                <div class="invalid-feedback"> {{ $errors->first('price') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-success">GRAVAR</button>
    </form>
@endsection
