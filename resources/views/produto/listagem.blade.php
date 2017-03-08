@extends('layout.principal')


@section('conteudo')
    @if(empty($produtos))
        <div class="alert alert-danger" style="margin: 10px;">
            Você não tem nenhum produto cadastrado.
        </div>
    @else
        <h1>Listagem de produtos</h1>
        <div class="table-responsive">
            <span class="label label-danger pull-right" style="margin-bottom: 5px">
                Estoque baixo
            </span>
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <th>Nome</th>
                    <th>Valor (R$)</th>
                    <th>Descrição</th>
                    <th>Quantidade (Und)</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($produtos as $p)
                    <tr class="{{$p->quantidade <= 1 ? 'danger' : ''}}">
                        <td>{{$p->nome}}</td>
                        <td>{{$p->valor}}</td>
                        <td>{{$p->descricao}}</td>
                        <td>{{$p->quantidade}}</td>
                        <td class="text-center">
                            <a href="{{action('ProdutoController@mostra', $p->id)}}">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{action('ProdutoController@remove', $p->id)}}">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{action('ProdutoController@edite', $p->id)}}">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif

    @if(old('nome'))
        <div class="alert alert-success">
            <strong>Sucesso!</strong> O produto {{ old('nome') }} foi adicionado.
        </div>
    @endif
@stop
