@extends('layouts.admin-master',['CreateProdutoAtivo'=>true])

@section('content')
<form action="/produtos/{{$produto->id}}" class="flex-grow-1 w-auto m-5" method="post">
	@method('put')
	@csrf
	<div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror " id="nome" placeholder="Nome do produto"
            value="{{$produto->nome}}">
        @error('nome')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="categoria">Categoria</label>
        <select class="form-control @error('categoria') is-invalid @enderror" id="categoria" name="categoria">
            {{-- <option selected disabled>Categoria....</option> --}}
            @foreach($categorias as $c)
            <option {{ $c->id == $produto->id_categoria ? 'selected' : '' }}  value=" {{$c->id}}"> {{ $c->nome }} </option>
            @endforeach
        </select>
        @error('categoria')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="nome">Preço</label>
        <input type="number" step="0.01" class="form-control @error('preco') is-invalid @enderror  " name="preco" id="preco" placeholder="Preço"
            value="{{ $produto->preco }}">
        @error('preco')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div lass="form-group">
        <label for="qtde">Quantidade</label>
        <input type="number" class="form-control @error('quantidade') is-invalid @enderror" id="quantidade" name="quantidade" placeholder="Quantidade"
            value="{{ $produto->quantidade }}">
        @error('quantidade')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button class="btn btn-warning float-right w-25">Salvar</button>
</form>

@endsection
