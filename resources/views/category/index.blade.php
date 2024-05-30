@extends('layouts.app')

@section('title', 'Category')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<p>Listado de categorías</p>
@endsection
