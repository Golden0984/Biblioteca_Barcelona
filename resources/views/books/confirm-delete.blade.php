@extends('../welcome')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1 class="text-center">Eliminar Libro</h1>
        </div>
        <div class="card-body">
          <p class="lead text-center">¿Estás seguro que deseas eliminar el libro "{{ $book->title }}"?</p>
          <div class="d-flex justify-content-center">
            <form action="{{ route('books.destroy', $book) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger mr-2">Eliminar</button>
            </form>
            <a href="{{ route('books.index') }}" class="btn btn-secondary ml-2">Cancelar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection