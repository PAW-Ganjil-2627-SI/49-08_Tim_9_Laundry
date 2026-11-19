@extends('layouts.app')

@section('title', 'Edit Mesin')

@section('content')
    <h1>Edit Mesin & Peralatan</h1>
    <div class="card">
        <form action="{{ route('mesin.update', $mesin) }}" method="POST">
            @method('PUT')
            @include('mesin._form')
        </form>
    </div>
@endsection