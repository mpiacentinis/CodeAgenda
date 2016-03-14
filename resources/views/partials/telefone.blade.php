<p><a href="#" class="label label-primary">Novo Telefone</a></p>
<table class="table table-hover">
    @foreach( $telefones as $telefone )
        <tr>
            <td>{{ $telefone->descricao }}</td>
            <td>{{ $telefone->numero }}</td>
            <td>
                <a href="{{ route('agenda.deleteFone', ['id' => $telefone->id ]) }}" class="btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fa fa-minus-circle"> </i> </a>
            </td>
        </tr>
    @endforeach
</table>