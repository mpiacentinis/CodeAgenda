@extends('layout')

@section('content')

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><h4>Novo Contato</h4></div>
        <div class="panel-body">
            <div class="col-md-6">
                <form class="form-horizontal" action="{{ route('agenda.contato') }}" method="post">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nome de Contato">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="apelido" class="col-sm-2 control-label">Apelido</label>
                        <div class="col-sm-10">
                            <input type="text"  name="apelido" class="form-control" id="apelido" placeholder="Apelido do contato">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sexo" value="F"><i class="fa fa-female"></i></br>
                                    <input type="radio" name="sexo" value="M"><i class="fa fa-male"></i></br>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
               @if( count( $errors ) > 0 )
                    <div class="alert alert-danger">
                        <ul>
                            @foreach( $errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>





@endsection