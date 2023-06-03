@extends('index')

@section('content')
    <form method="POST" action="{{ route('cadastrar.venda') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cadastrar nova Venda</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Numeração</label>
            <input type="text" disabled class="form-control @error('numero_da_venda') is-invalid @enderror" name="numero_da_venda"
                value="{{ $findNumeracao}}">
            @if ($errors->has('numero_da_venda'))
                <div class="invalid-feedback">{{ $errors->first('numero_da_venda') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-success">GRAVAR</button>
    </form>
@endsection
