@extends('layouts.app')

@section('title', 'Edit Bahan Pembersih')

@section('content')
    <h1>Edit Bahan Pembersih</h1>
    <div class="card">
        <form action="{{ route('bahan-pembersih.update', $bahan) }}" method="POST">
            @method('PUT')
            @include('bahan-pembersih._form')
        </form>
    </div>
@endsection