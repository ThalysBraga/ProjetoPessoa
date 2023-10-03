@extends('layout')

@section('title', 'Nova pessoa')

@section('content')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">MENU</a></li>
      <li class="breadcrumb-item"><a href="{{ route('pessoa.index') }}">PESSOAS</a></li>
      <li class="breadcrumb-item active" aria-current="page">NOVO</li>
    </ol>
  </nav>

  <h3 class="card-title text-center">NOVA PESSOA</h3>

  <form method="POST" action="{{ route('pessoa.store') }}">
    @csrf
    <div class="p-3 mb-2">
      <label for="nome">Nome</label>
      <input class="form-control"
        name="nome"
        id="nome"
        type="text"
        value="{{ old('nome') }}"
        placeholder="Digite o nome da pessoa"
        required>
    </div>

    <div class="p-3 mb-2">
      <label for="cpf"> CPF </label>
      <input class="form-control"
        name="cpf"
        id="cpf"
        ttype="tel"
        onkeypress="$(this).mask('000.000.000-00')"
        value="{{ old('cpf') }}"
        placeholder="Digite o CPF da pessoa" required>
    </div>

    <div class="p-3 mb-2">
      <label for="data_nascimento"> Data de nascimento </label>
      <input class="form-control"
        name="data_nascimento"
        id="data_nascimento"
        type="date"
        value="{{ old('data_nascimento') }}"
        placeholder="Digite a data de nascimento da pessoa" required>
    </div>

    <div class="p-3 text-right">
      <button class="btn btn-success" title="Salvar" type="submit">Salvar</button>
      <a class="btn btn-danger" title="Cancelar" href="{{ route('pessoa.index') }}">Cancelar</a>
    </div>
  </form>
@endsection
