<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"> @if( $pessoa->sexo == 'F' ) <i class="fa fa-female"></i> @else <i class="fa fa-male"></i> @endif    {{ $pessoa->apelido }}</h3>
    </div>
    <div class="panel-body">
        <h3> {{ $pessoa->name }}
            <span class="pull-right">
                <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i> </a>
                <a href="{{ route('agenda.destroyPessoa', ['id' => $pessoa->id ]) }}" class="btn btn-danger btn-xs"data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fa fa-minus-circle"></i> </a>
            </span>
        </h3>
        <table class="table table-hover">
            @foreach($pessoa->telefone as $telefone )
                <tr>
                    <td>{{ $telefone->descricao }}</td>
                    <td>{{ $telefone->numero }}</td>
                    <td>
                        <a href="{{ route('agenda.destroyFone', ['id' => $telefone->id ]) }}" class="btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fa fa-minus-circle"> </i> </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>