<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index(Request $request) {
        return view('pessoa.index')
            ->with('pessoas', Pessoa::all());
    }

    public function show(Request $request, Pessoa $pessoa)
    {
        return view('pessoa.show')
            ->with('pessoa', $pessoa);
    }

    public function create(Request $request) {
        return view('pessoa.create');
    }

    public function store(Request $request) {
        $request->validate([
            "nome" => "required",
            "data_nascimento" => "required|date",
            "cpf" => "required|min:14|max:14",
        ]);

        $dadosPreparados = $this->dadosPreparados($request->all());

        $duplicado = Pessoa::Firstwhere('cpf', $dadosPreparados['cpf']);

        if (!is_null($duplicado)) {
            $request->session()->flash('erro', "Já existe uma pessoa com mesmo CPF cadastrada no sistema");
            return redirect()->back();
        }

        $pessoa = Pessoa::create($dadosPreparados);

        return redirect()
            ->route('pessoa.show', [
                'pessoa' => $pessoa
            ]);
    }

    public function edit(Request $request, Pessoa $pessoa)
    {
        return view('pessoa.edit')
            ->with('pessoa', $pessoa);
    }

    public function update(Request $request, Pessoa $pessoa)
    {
        $request->validate([
            "nome" => "required",
            "data_nascimento" => "required|date",
            "cpf" => "required|min:14|max:14",
        ]);

        $dadosPreparados = $this->dadosPreparados($request->all());

        $pessoa->update($dadosPreparados);

        return redirect()
            ->route('pessoa.show', [
                'pessoa' => $pessoa
            ]);
    }

    public function delete(Request $request, Pessoa $pessoa)
    {
        $request->session()->flash('confirmar_exclusao', $pessoa->id);
        return back();
    }

    public function destroy(Request $request, Pessoa $pessoa)
    {
        $pessoa->delete();
        return redirect()->route('pessoa.index');
    }

    public function dadosPreparados($params)
    {
        return [
            'nome' => mb_strtoupper($params['nome']),
            'cpf' => preg_replace('/[^0-9]/', '', $params['cpf']), // Remove os caracteres especiais
            'data_nascimento' => $params['data_nascimento']
        ];
    }
}
