@extends('pelanggan.layout')
@section('title', 'Tambah Pelanggan')
@section('content')

<div class="toolbar"><h2>Tambah Pelanggan</h2></div>

@if($errors->any())
    <div class="alert alert-error">
        <ul style="margin:0; padding-left:20px;">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card" style="padding:24px; max-width:560px;">
    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf
        @include('pelanggan._form')
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('pelanggan.index') }}" class="btn">Batal</a>
    </form>
</div>

@endsection