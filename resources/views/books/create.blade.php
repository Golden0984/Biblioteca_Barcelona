@extends('../welcome')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
      <div class="card">
        <div class="card-header text-center">
          <h1 class="mb-0">Añadir un Libro</h1>
        </div>
        <div class="card-body">
          <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="title">Título:</label>
              <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="author">Autor:</label>
              <input type="text" id="author" name="author" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="image_url">URL de la imagen:</label>
              <input type="text" id="image_url" name="image_url" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="description">Descripción:</label>
              <textarea id="description" name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label for="categories">Categorías:</label>
              <select id="categories" name="categories[]" class="form-control" multiple required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="price">Precio:</label>
              <input type="text" id="price" name="price" class="form-control" required>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-lg">Agregar</button>
              <a class="btn btn-secondary btn-lg" href="{{ route('books.index') }}">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
