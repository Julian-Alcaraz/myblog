@extends('layouts.app')

@section('title', 'Category show')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>Vista detalle del post con id <?php echo $id;?></p>
@endsection
