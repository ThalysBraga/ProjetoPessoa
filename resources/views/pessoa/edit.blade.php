@extends('layout')

@section('title', 'Editar pessoa')

@section('content')

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">MENU</a></li>
      <li class="breadcrumb-item"><a href="{{ route('pessoa.index') }}">PESSOAS</a></li>
      <li class="breadcrumb-item"><a href="{{ route('pessoa.show', ['pessoa' => $pessoa->id]) }}">{{ $pessoa->nome }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">EDITAR</li>
    </ol>
  </nav>

  <h3 class="card-title text-center">EDITAR - {{ $pessoa->nome }} </h3>

  <form method="POST" action="{{ route('pessoa.update', ['pessoa' => $pessoa]) }}">
    @csrf
    <div class="p-3 mb-2">
      <label for="nome">Nome</label>
      <input class="form-control"
        name="nome"
        id="nome"
        value="{{old('nome') ?? $pessoa->nome}}"
        type="text"
        placeholder="Digite o nome da pessoa"
        required>
    </div>

    <div class="p-3 mb-2">
      <label for="cpf"> CPF </label>
      <input class="form-control"
        name="cpf"
        id="cpf"
        type="tel"
        onkeypress="$(this).mask('000.000.000-00')"
        value="{{old('cpf') ?? $pessoa->cpf_formatado}}"
        placeholder="Digite o CPF da pessoa"
        required>
    </div>

    <div class="p-3 mb-2">
      <label for="data_nascimento"> Data de nascimento </label>
      <input class="form-control"
        name="data_nascimento"
        id="data_nascimento"
        type="date"
        value="{{old('data_nascimento') ?? $pessoa->data_nascimento->format("Y-m-d")}}"
        placeholder="Digite a data de nascimento da pessoa"
        required>
    </div>

    <div class="p-3 text-right">
      <button class="btn btn-success" title="Salvar" type="submit">Salvar</button>
      <a class="btn btn-danger" title="Cancelar" href="{{ route('pessoa.index') }}">Cancelar</a>
    </div>

  </form>
@endsection
