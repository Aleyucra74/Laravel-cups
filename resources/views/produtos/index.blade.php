
@extends('layouts.admin-master',['produtosAtivo'=>true])

@section('content')
	<div class="flex-grow-1 w-auto mb-5">
		<a href="/produtos/create" class="btn btn-warning m-3 float-right">Novo Produto</a>
		<table class="table">
			<thead>
				<td>ID</td>
				<td>Nome</td>
				<td>Preço</td>
				<td>Qtde</td>
				<td>Categoria</td>
				<td>Ações</td>
			</thead>
			<tbody>
				@foreach($produtos as $p)
				<tr>
					<td class="align-middle">{{ $p->id }}</td>
					<td class="align-middle">{{ $p->nome }}</td>
					<td class="align-middle">{{ $p->preco }}</td>
					<td class="align-middle">{{ $p->quantidade }}</td>
					<td class="align-middle">{{ $p->categoria->nome }}</td>
					<td class="align-middle">
						<a class="badge badge-warning" href=" /produtos/{{$p->id}} ">Visualizar</a>
						<a class="badge badge-primary" href="/produtos/{{$p->id}}/edit">Editar</a>
						<form action="" method="post">
							<button type="submit" class="btn badge badge-danger">Remover</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	<div> {{ $produtos->links() }} </div>
	</div>
	
@endsection
