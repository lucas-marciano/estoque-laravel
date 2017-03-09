@extends('layout.principal')

@section('conteudo')

    <h1>Cadastrar novo produto</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li> {{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/produtos/adiciona" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
        <div class="form-group">
            <input value="{{ old('nome') }}" type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
        </div>
        <div class="form-group">
            <input value="{{ old('descricao') }}" type="text" class="form-control" id="descricao" placeholder="Descrição" name="descricao">
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">R$</div>
                <input value="{{ old('valor') }}" type="number" class="form-control" id="valor" name="valor" min="0" step="0.01"
                       placeholder="Valor">
            </div>
        </div>

        <div class="form-group">
            <input value="{{ old('quantidade') }}" type="number" class="form-control" id="quantidade" name="quantidade" min="0"
                   placeholder="Quantidade">
        </div>

        <button type="submit" class="btn btn-success btn-block">Adicionar</button>
    </form>
@stop
