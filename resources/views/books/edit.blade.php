@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Knyga</div>

                    <div class="card-body">
                        <form method="POST" action="{{ isset($book)?route('books.update', $book->id):route('books.store') }}">
                            @csrf
                            {{--                            dedam if kadangi jei vien put, panaikins Pridėjima --}}
                            @if (isset($book))
                                {{--                                put reikalingas, kad veiktų Redagavimas --}}
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label class="form-label">Pavadinimas</label>
                                <input type="text" name="name" class="form-control" value="{{ isset($book)?$book->name:'' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Santrauka</label>
                                <input type="text" name="resume" class="form-control" value="{{ isset($book)?$book->resume:'' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >ISBN kodas</label>
                                <input type="text" name="isbn" class="form-control" value="{{ isset($book)?$book->isbn:'' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Nuotrauka</label>
                                <input type="text" name="picture" class="form-control" value="{{ isset($book)?$book->picture:'' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Puslapių sk.</label>
                                <input type="text" name="page_numbers" class="form-control" value="{{ isset($book)?$book->page_numbers:'' }}">
                            </div>


                            <div class="mb-3">
                                <select name="category_id" class="form-select">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ isset($book)&&($category->id==$book->category_id)?'selected':'' }}> {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">{{ isset($book)?'Išsaugoti':'Pridėti' }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
