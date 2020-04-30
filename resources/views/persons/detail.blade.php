@extends('layouts.app')
@section('content')
<section class="container">
    <h1 class="clearfix">Member's Details
        <div class="float-md-right">
            <a href="{{ url('/dashboard') }}" class="btn btn-success text-white"><span class="fa fa-arrow-left"></span> Back to Dashboard</a>
        </div>
    </h1>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2">
                    @if ($person->photo !== null)
                    <div class="rounded-circle profile-thumbnail" style="background-image: url({{ asset('uploads/'.$person->photo) }})"></div>
                    @else
                    <div class="rounded-circle profile-thumbnail"></div>
                    @endif
                </div>
                <div class="col-md-10">
                    @php
                        $fname = ucfirst($person->fname);
                        $lname = ucfirst($person->lname).', ';
                        $mname = '';
                        if ($person->mname) {
                            $mname = ' '.ucfirst(substr($person->mname, 0, 1)).'.';
                        }
                    @endphp
                    <h3 class="profile-name mb-none">@php echo $lname.$fname.$mname; @endphp</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <detail-form-body 
                :person-details="{{ collect($person) }}"
                age="{{$age}}"
                civil-status="{{$cstatus}}"
                registered-on="{{ date("F j, Y, g:i A", strtotime($person->created_at)) }}"
                >
            </detail-form-body>
            <div class="form-row">
                <div class="form-group col-12">
                    <div class="float-md-right text-center">
                        <a href="{{ url('/members') }}" class="btn btn-primary text-white"><span class="fa fa-arrow-left"></span> Members List</a>
                        <a href="{{ url("/members/$person->id/edit") }}" class="btn btn-warning"><span class="fa fa-pencil"></span> Edit</a>                    
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete"><span class="fa fa-trash"></span> Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('inc.modaldelete')
@endsection