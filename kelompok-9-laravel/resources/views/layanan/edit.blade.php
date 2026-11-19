@extends('layouts.app')

@section('title', 'Edit Layanan')

@section('content')
    <h1>Edit Layanan</h1>
    <div class="card">
        <form action="{{ route('layanan.update', $layanan) }}" method="POST">
            @method('PUT')
            @include('layanan._form')
        </form>
    </div>
@endsection