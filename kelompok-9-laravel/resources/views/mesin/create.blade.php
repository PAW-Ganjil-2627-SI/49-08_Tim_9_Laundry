@extends('layouts.app')

@section('title', 'Tambah Mesin')

@section('content')
    <h1>Tambah Mesin & Peralatan</h1>
    <div class="card">
        <form action="{{ route('mesin.store') }}" method="POST">
            @include('mesin._form')
        </form>
    </div>
@endsection