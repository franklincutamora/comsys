@extends('layouts.app')
@section('content')
<section class="container">
    <h1 class="clearfix">Add New Person</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
    <div class="card">
        {!! Form::open(['action' => 'Persons\PersonsController@store', 'enctype' => 'multipart/form-data']) !!}
        @csrf
        <create-form-body persons-url="{{ url('/persons') }}"></create-form-body>
        {!! Form::close() !!}
    </div>
</section>
@endsection