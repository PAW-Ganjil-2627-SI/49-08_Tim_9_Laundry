@extends('pelanggan.layout')
@section('title', 'Ubah Pelanggan')
@section('content')

<div class="toolbar"><h2>Ubah Pelanggan</h2></div>

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
    <form action="{{ route('pelanggan.update', $pelanggan) }}" method="POST">
        @csrf
        @method('PUT')
        @include('pelanggan._form')
        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('pelanggan.index') }}" class="btn">Batal</a>
    </form>
</div>

@endsection