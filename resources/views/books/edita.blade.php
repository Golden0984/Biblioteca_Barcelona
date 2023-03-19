@extends('../welcome')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <center>
                    <h3 class="card-title">Editar Libro</h3>
                    </center>
                </div>
                <div class="card-body">
                    <form action="{{ route('books.update', $book) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Título:</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ $book->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="author">Autor:</label>
                            <input type="text" id="author" name="author" class="form-control" value="{{ $book->author }}" required>
                        </div>

                        <div class="form-group">
                            <label for="image_url">URL de la imagen:</label>
                            <input type="text" id="image_url" name="image_url" class="form-control" value="{{ $book->image_url }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Descripción:</label>
                            <textarea id="description" name="description" class="form-control" required>{{ $book->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="categories">Categorías:</label>
                            <select id="categories" name="categories[]" multiple class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $book->category->contains($category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Precio:</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </span>
                                <input type="text" id="price" name="price" class="form-control" value="{{ $book->price }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
