@extends('index')

@section('content')
    <form method="POST" action="{{route('cadastrar.produto')}}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cadastrar Produto</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome">
        </div>
        <div class="mb-3">
            <label class="form-label">Valor</label>
            <input  class="form-control" name="valor">
        </div>
        <button type="submit" class="btn btn-success">CADASTRAR</button>
    </form>
@endsection
