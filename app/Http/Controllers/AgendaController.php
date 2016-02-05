<?php

namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Pessoa;
use CodeAgenda\Entities\Telefone;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index ( $letra = "A") {


        $pessoas = Pessoa::where('apelido', 'like', $letra.'%')->get()->sortBy('apelido');
        $relacao = $this->getLetras();
        return view('agenda', compact('pessoas','relacao'));

    }

    public function busca( Request $request ) {

        $string = $request->busca;
        if ( $string == '') {
            $pessoas = Pessoa::all()->sortBy('apelido');
        } else {
            $pessoas = Pessoa::where('apelido', 'like', '%'.$string.'%' )->orWhere('name', 'like', '%'.$string.'%' )->get()->sortBy('apelido');
        }
        $relacao = $this->getLetras();
        return view('agenda', compact('pessoas','relacao'));

    }

    protected function getLetras(){

        $registros = [];

        foreach( Pessoa::all() as $pessoa ) {
            $registros[] = strtoupper(substr($pessoa->apelido,0,1));
        }
        sort( $registros);

        return  array_unique( $registros );

    }

    public function destroyPessoa( $id ){
        $pessoa = Pessoa::find($id );
        $fones = $pessoa->telefone ;

        if ( count( $pessoa ) == 0  ) {
            return [
                'error' => true,
                'message' => 'Não encontrado'
            ];
        } else {


            if ( count( $fones ) > 0 ) {
                return [
                    'error' => true,
                    'message' => 'Tem Numero Cadastrado, não e possivel excluir'
                ];
            } else {
                Pessoa::destroy( $id );
                return redirect( route('agenda.index'));
            }
        }

    }

    public function destroyFone( $id ){
        $fones = Telefone::find($id ) ;

        if ( count($fones ) == 0  ) {
            return [
                'error' => true,
                'message' => 'Não encontrado'
            ];
        } else {
            Telefone::destroy( $id );
            return redirect( route('agenda.index'));

        }
    }
}
