<div class="panel @if( $pessoa->sexo == 'F' ) panel-danger @else panel-info @endif">
    <div class="panel-heading">
        <h3 class="panel-title">
            @if( $pessoa->sexo == 'F' )
                <i class="fa fa-female"></i>
            @else
                <i class="fa fa-male"></i>
            @endif
                {{ $pessoa->apelido }}

            <span class="pull-right">
                <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></a>
                <a href="{{ route('agenda.deletePessoa', ['id' => $pessoa->id ]) }}" class="btn btn-danger btn-xs"data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fa fa-minus-circle"></i> </a>
            </span>
        </h3>
    </div>

    <div class="panel-body">
        <h3>{{ $pessoa->nome }}</h3>
        @include('partials.telefone', ['telefones' => $pessoa->telefone ])
    </div>
</div>