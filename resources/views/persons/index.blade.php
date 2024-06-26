@extends('layouts.app')
@section('content')
<section class="container persons">
    <h1 class="clearfix">Members
        <div class="float-md-right">
            <button type="button" class="btn btn-info text-white" data-toggle="modal" data-target="#searchPerson"><span class="fa fa-search"></span> Search</button>
            @if ($search)
                <a href="{{ url('/members') }}" class="btn btn-success text-white"><span class="fa fa-arrow-left"></span> Back to List</a>
            @else
                <a href="{{ url('/members/create') }}" class="btn btn-success text-white"><span class="fa fa-plus"></span> Add New</a>
            @endif
        </div>
    </h1>
    @if($persons !== null && count($persons) > 0)
        @foreach($persons as $key => $person)
        <div class="card mb-medium person-item">
            @php
                $fname = ucfirst($person->fname);
                $lname = ucfirst($person->lname).', ';
                $mname = '';
                if ($person->mname) {
                    $mname = ' '.ucfirst(substr($person->mname, 0, 1)).'.';
                }
            @endphp
            <div class="card-header">
                <div class="lead"><small class="list-counter border border-primary rounded-circle text-center">{{ $persons->firstItem() + $key }}</small> @php echo $lname.$fname.$mname; @endphp</div>
            </div>
            <div class="card-body clearfix">
                <div class="float-md-left text-center">
                    <div>Last Update: {{ date("F j, Y, g:i A", strtotime($person->updated_at)) }}</div>
                </div>
                <div class="float-md-right text-center">
                    <a href="{{ url("/members/$person->id") }}" class="btn btn-primary text-white"><span class="fa fa-th"></span> View Details</a>
                    <a href="{{ url("/members/$person->id/edit") }}" class="btn btn-warning"><span class="fa fa-pencil"></span> Edit Details</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete" data-id="{{ $person->id }}"><span class="fa fa-trash"></span></button>
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
    @include('inc.modalsearch')
    @include('inc.modaldelete')
</section>
@endsection