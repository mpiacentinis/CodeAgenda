@extends('layout')

@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><h4>Telefone</h4></div>
        <div class="panel-body">
            <div class="col-md-6">
                <h3>Deseja Excluir o Número de Telefone? <br>
                    <small>{{ $telefone->descricao }} : {{ $telefone->numero }}</small></h3>
                <form action="{{ route('agenda.destroyFone', ['id' => $telefone->id ]) }}" method="post">
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="submit" class="btn btn-danger">SIM</button>
                    <a href="{{ route('agenda.index' )  }}"  class="btn btn-success">NÃO</a>
                </form>
            </div>
            <div class="col-md-6">
                @include('partials.contato');
            </div>
        </div>
    </div>

@endsection