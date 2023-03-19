@extends('../welcome')

@section('content')
    <div class="container">
        <h1 class="text-center mb-5">Biblioteca</h1>
        <a class="btn btn-dark" href="{{ route('books.create') }}">Añadir un Libro</a>
        <form action="{{ route('books.index') }}" method="get" class="mb-5">
            <div class="row">
                <div class="col-md-6">
                    <label for="category">Filter by category:</label>
                    <select class="form-select" name="category" id="category">
                        <option value="">All</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == $selectedCategory) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-info mt-2" type="submit">Filter</button>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" placeholder="Search" class="form-control" name="search" id="search" value="{{ $search }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </div>
        </form>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($books->count())
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>
                                    @foreach($book->category as $category)
                                        <p>{{ $category->name }}</p>
                                    @endforeach
                                </td>
                                <td>{{ $book->description }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('books.show', ['id' => $book->id]) }}">View</a>
                                    <a class="btn btn-warning" href="{{ route('books.edit', ['id' => $book->id]) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('books.confirm-delete', ['id' => $book->id]) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">No results found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            
            <div class="text-center">
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection
