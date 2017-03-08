@extends('layout.principal')

@section('conteudo')
    <h1>Novo produto</h1>
    <form action="/produtos/adiciona" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="form-group">
            <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="descricao" placeholder="Descrição" name="descricao">
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">R$</div>
                <input type="number" class="form-control" id="valor" name="valor" min="0" step="0.01" placeholder="Valor">
            </div>
        </div>

        <div class="form-group">
            <input type="number" class="form-control" id="quantidade" name="quantidade" min="0" placeholder="Quantidade">
        </div>

        <button type="submit" class="btn btn-success btn-block">Salvar</button>
    </form>
@stop
