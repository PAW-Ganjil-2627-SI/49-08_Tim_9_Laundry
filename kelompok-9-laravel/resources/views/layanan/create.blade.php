@extends('layouts.app')

@section('title', 'Tambah Layanan')

@section('content')
    <h1>Tambah Layanan</h1>
    <div class="card">
        <form action="{{ route('layanan.store') }}" method="POST">
            @include('layanan._form')
        </form>
    </div>
@endsection