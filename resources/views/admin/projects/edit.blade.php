@extends('layouts.app')
@section('content')
    <div class="container my-4">
        <h1 class="mb-3">Modifica {{ $project->title }}</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="titolo" placeholder="Titolo" name="title"
                    value="{{ old('title', $project->title) }}">
                <label for="titolo">Titolo</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Descrizione" id="descrizione" name="description" style="height: 150px">{{ old('title', $project->description) }}</textarea>
                <label for="descrizione">Descrizione</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select " id="type-id" aria-label="Floating label select example" name="type_id">
                    <option></option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id', $project->type_id) === $type->id) selected @endif>
                            {{ $type->title }}</option>
                    @endforeach
                </select>
                <label for="type-id">Selezione la tipologia</label>
            </div>
            <button class="btn btn-primary">Conferma modifiche</button>
        </form>
    </div>
@endsection
