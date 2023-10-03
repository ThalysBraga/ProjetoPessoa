@extends('layout')

@section('title', 'Pessoa')

@section('content')

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">MENU</a></li>
      <li class="breadcrumb-item"><a href="{{ route('pessoa.index') }}">PESSOAS</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $pessoa->nome }}</li>
    </ol>
  </nav>

  <h3 class="card-title text-center"> {{ $pessoa->nome }} </h3>

  @if (session('confirmar_exclusao'))
    <div class="alert alert-danger" role="alert">
      <div class="m-2">
        <h5 class="modal-title" id="exampleModalLabel">EXCLUIR PESSOA</h5>
        Deseja excluir essa pessoa? Essa ação é definitiva
      </div>
      <div class="d-flex">
        <div class="m-2">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        <div class="m-2">
          <form action="{{ route('pessoa.destroy', ['pessoa' => $pessoa->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"> Deletar </button>
          </form>
        </div>
      </div>
    </div>
  @endif

  <div class="p-3">
    <p>
      <span class="font-weight-bold"> CPF: </span>
      {{ $pessoa->cpf_formatado }}
    </p>

    <p>
      <span class="font-weight-bold"> Data de nascimento: </span>
      {{ $pessoa->data_nascimento->format('d/m/Y') }}
    </p>
  </div>

  <div class="text-center">
    <a href="{{ route('pessoa.edit', ['pessoa' => $pessoa->id]) }}" style="align-content: space-between"
      title="Editar dados" class="btn btn-info">
      <i class="bi bi-pencil-square"></i>
      Editar
    </a>

    <a title="Excluir" class="btn btn-danger" style="align-content: space-between" href="{{ route('pessoa.delete', ['pessoa'=>$pessoa->id]) }}">
      <i class="bi bi-trash"></i>
      Excluir
    </a>
  </div>
@endsection
