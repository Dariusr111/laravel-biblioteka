@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Kategorijos</div>

                    <div class="card-body">
                        <a href=" {{ route('categories.create') }}" class="btn btn-success">Pridėti naują</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Pavadinimas</th>
                                <th colspan="2">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('categoryBooks',$category->id) }}" class="btn btn-success">Knygos</a>
                                    </td>
                                    <td>
                                        <a href=" {{ route('categories.edit', $category->id) }}" class="btn btn-success">Redaguoti</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('categories.destroy', $category->id) }}">
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
