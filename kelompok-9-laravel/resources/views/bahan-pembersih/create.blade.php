@extends('layouts.app')

@section('title', 'Tambah Bahan Pembersih')

@section('content')
    <h1>Tambah Bahan Pembersih</h1>
    <div class="card">
        <form action="{{ route('bahan-pembersih.store') }}" method="POST">
            @include('bahan-pembersih._form')
        </form>
    </div>
@endsection