<?php

namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Pessoa;
use CodeAgenda\Entities\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgendaController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index ( $letra = "A") {


        $pessoas = Pessoa::where('apelido', 'like', $letra.'%')->get()->sortBy('apelido');

        return view('agenda.agenda', compact('pessoas'));

    }

    public function createContato() {

        $errors = [];
        return view('pessoa.create', compact('errors' ));
    }

    public function storeContato( Request $request) {

        $validator = Validator::make($request->all(), [
           'name' => 'required|min:3|max:255|unique:pessoas',
           'apelido' => 'required|min:2|max:50',
           'sexo' => 'required'
        ]);

        $errors = $validator->messages();

        if ($validator->fails()) {
            return view('pessoa.create',compact('errors') );
        }

        Pessoa::create($request->all());
        return redirect()->route('agenda.index');
    }

    public function busca( Request $request ) {

        $string = $request->busca;
        if ( $string == '') {
            $pessoas = Pessoa::all()->sortBy('apelido');
        } else {
            $pessoas = Pessoa::where('apelido', 'like', '%'.$string.'%' )->orWhere('name', 'like', '%'.$string.'%' )->get()->sortBy('apelido');
        }
        return view('agenda.agenda', compact('pessoas'));

    }



    public function deletePessoa( $id ){
        $pessoa = Pessoa::find($id );
        return view('pessoa.delete', compact('pessoa'));
    }

    public function deleteFone( $id ){
        $telefone = Telefone::find($id );
        $pessoa = $telefone->pessoa;
        return view('telefone.delete', compact('telefone','pessoa'));
    }

    public function destroyPessoa( $id ){
        Pessoa::destroy( $id );
        return redirect( route('agenda.index'));
    }

    public function destroyFone( $id ){
        Telefone::destroy( $id );
        return redirect( route('agenda.index'));
    }
}
