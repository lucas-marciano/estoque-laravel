@extends('layout.principal')


@section('conteudo')
    @if(empty($p))
        <div class="alert alert-danger">
            Você não tem nenhum produto cadastrado.
            <p><a href="/">Voltar</a></p>
        </div>
    @else
        <h1>Detalhes do produto: {{$p->nome}} </h1>
        <ul>
            <li>
                <b>Valor:</b> R$ {{$p->valor}}
            </li>
            <li>
                <b>Descrição:</b> {{$p->descricao }}
            </li>
            <li>
                <b>Quantidade em estoque:</b> {{$p->quantidade}}
            </li>
        </ul>
    @endif
@stop
