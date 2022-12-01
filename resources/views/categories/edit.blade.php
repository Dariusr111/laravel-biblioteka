@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Kategorija</div>

                    <div class="card-body">
                        <form method="POST" action="{{ isset($category)?route('categories.update', $category->id):route('categories.store') }}">
                            @csrf
                            {{--                            dedam if kadangi jei vien put, panaikins Pridėjima --}}
                            @if (isset($category))
                                {{--                                put reikalingas, kad veiktų Redagavimas --}}
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label class="form-label">Pavadinimas</label>
                                <input type="text" name="name" class="form-control" value="{{ isset($category)?$category->name:'' }}">
                            </div>
                            <button type="submit" class="btn btn-success">{{ isset($category)?'Išsaugoti':'Pridėti' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
