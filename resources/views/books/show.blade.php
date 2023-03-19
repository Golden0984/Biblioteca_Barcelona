@extends('../welcome')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">
                    <h1 class="text-center">{{ $book->title }}</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $book->image_url }}" alt="{{ $book->title }}" class="card-img">
                            <br><br>
                            <p class="card-text">
                                <b>Fecha de publicación:</b> {{ $book->published_date }}<br>
                                <b>Precio:</b> {{ $book->price }}€
                            </p>
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title">Autor: {{ $book->author }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Categorías:</h6>
                            <ul class="list-unstyled">
                                @foreach($book->category as $category)
                                <li>{{ $category->name }}</li>
                                @endforeach
                            </ul>
                            <p class="card-text">
                                <h5>Descripción:</h5>
                                {{ $book->description }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a class="btn btn-secondary" href="{{ route('books.index') }}">Volver a la lista</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection