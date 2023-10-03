@extends('layout')

@section('title', 'Pessoas')

@section('content')

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">MENU</a></li>
      <li class="breadcrumb-item active" aria-current="page">PESSOAS</li>
    </ol>
  </nav>

  <h3 class="card-title text-center">PESSOAS</h3>

  <div class="row p-3">
    <div class="col-8">
      <a href="{{ route('pessoa.create') }}" title="Cadastrar pessoa" style="align-content: space-between"
        class="btn btn-success">
        <i class="bi bi-plus"></i>
        NOVO
      </a>
    </div>
  </div>

  @if ($pessoas->count() == 0)
    <div class="alert alert-warning" role="alert">
      O sistema não possui pessoas cadastrados! Cadastre novas pessoas clicando no botão acima.
    </div>
  @else
    <div class="px-3">
      <input class="form-control" type="text" id="busca" placeholder="Digite aqui para pesquisar" />
    </div>

    <div class="p-3">
      <table id="tabela" class="table table-light table-striped table-bordered table-hover"
        style="border-radius: 25px;">
        <thead class="thead-dark">
          <tr>
            <th class="text-center">#</th>
            <th>Nome</th>
            <th class="text-center">CPF</th>
            <th class="text-center">Data nascimento</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pessoas as $pessoa)
            <tr>
              <td class="text-center font-weight-bold"> {{ $loop->iteration }} </td>
              <td><a href="{{ route('pessoa.show', ['pessoa' => $pessoa->id]) }}">{{ $pessoa->nome }}</td>
              <td class="text-center">{{ $pessoa->cpf_formatado }}</td>
              <td class="text-center">{{ $pessoa->data_nascimento->format('d/m/Y') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  @endif
  @push('script')
    <script>
      $(function() {
        $("#busca").keyup(function() {
          var filtro = $(this).val().toUpperCase();
          $("#tabela tbody tr").attr('class', '');
          $("#tabela tbody tr").each(function() {
            if ($(this).text().indexOf(filtro) < 0)
              $(this).attr('class', 'd-none');
          });
        });
      });
    </script>
  @endpush
@endsection
