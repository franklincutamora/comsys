@extends('layouts.app')
@section('content')
<section class="container">
    <h1 class="clearfix">Persons
        <div class="float-md-right">
            <button type="button" class="btn btn-info text-white" data-toggle="modal" data-target="#searchPerson"><span class="fa fa-search"></span> Search</button>
            @if ($search)
                <a href="{{ url('/persons') }}" class="btn btn-success text-white"><span class="fa fa-arrow-left"></span> Back to List</a>
            @else
                <a href="{{ url('/persons/create') }}" class="btn btn-success text-white"><span class="fa fa-plus"></span> Add New</a>
            @endif
        </div>
    </h1>
    @if(count($persons) > 0)
        @foreach($persons as $person)
        <div class="card mb-medium">
            @php
                $fname = ucfirst($person->fname);
                $lname = ucfirst($person->lname).', ';
                $mname = '';
                if ($person->mname) {
                    $mname = ' '.ucfirst(substr($person->mname, 0, 1)).'.';
                }
            @endphp
            <div class="card-header"><div class="lead">@php echo $lname.$fname.$mname; @endphp</div></div>
            <div class="card-body clearfix">
                
                <div class="float-md-left text-center">
                    <div>Last Update: {{ date("F j, Y, g:i A", strtotime($person->updated_at)) }}</div>
                </div>
                <div class="float-md-right text-center">
                    {!! Form::open(['action' => ['Persons\PersonsController@destroy', $person->id]]) !!}
                    <a href="{{ url("/persons/$person->id") }}" class="btn btn-primary text-white"><span class="fa fa-th"></span> View Details</a>
                    <a href="{{ url("/persons/$person->id/edit") }}" class="btn btn-warning"><span class="fa fa-pencil"></span> Edit Details</a>
                    {{ Form::hidden('_method', 'DELETE') }}
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete"><span class="fa fa-trash"></span></button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @endforeach
        {{ $persons->links() }}
    @else
        <div class="card mb-medium">
            @if ($search)
            <div class="card-header"><div class="lead">Search Results</div></div>
            <div class="card-body clearfix">
                <p>Searching all {{ $field }} with a keyword of <strong>'{{ $keyword }}'</strong> from the database in <strong>{{ $orderBy }}</strong> order.</p>
            @else
            <div class="card-header"><div class="lead">Records From Database</div></div>
            <div class="card-body clearfix">
            @endif
                <p>No records found from database.</p>
            </div>
        </div>
    @endif
</section>
@include('inc.modal')
@endsection