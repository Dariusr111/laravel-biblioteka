@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Knygos</div>

                    <div class="card-body">
                        <a href=" {{ route('books.create') }}" class="btn btn-success">Pridėti naują</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Pavadinimas</th>
                                <th>Santrauka</th>
                                <th>ISBN kodas</th>
                                <th>Nuotrauka</th>
                                <th>Puslapių nr.</th>
                                <th>Žandras</th>
                                <th colspan="2">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->resume }}</td>
                                    <td>{{ $book->isbn }}</td>
                                    <td>{{ $book->picture }}</td>
                                    <td>{{ $book->page_numbers }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>
                                        <a href=" {{ route('books.edit', $book->id) }}" class="btn btn-success">Redaguoti</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('books.destroy', $book->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Ištrinti</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
