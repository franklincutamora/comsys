@extends('layouts.app')
@section('content')
<section class="container">
    <h1 class="clearfix">Person Details
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
        {!! Form::open(['action' => ['PersonsController@destroy', $person->id]]) !!}
            @csrf
            <div class="form-row">
                <div class="form-group col-12 col-md-4">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" name="fname" readonly aria-readonly="true" value="{{ucfirst($person->fname)}}">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="mname">Middle Name</label>
                    <input type="text" class="form-control" name="mname" readonly aria-readonly="true" value="{{ucfirst($person->mname)}}">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" name="lname" readonly aria-readonly="true" value="{{ucfirst($person->lname)}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-4">
                    <label for="fname">Nickname</label>
                    <input type="text" class="form-control" name="nname" readonly aria-readonly="true" value="{{ucfirst($person->nname)}}">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="bday">Age</label>
                    <input type="text" class="form-control" name="bday" readonly aria-readonly="true" value="{{$age}} Years Old">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="cstatus">Civil Status</label>
                    <input type="text" class="form-control" name="cstatus" readonly aria-readonly="true" value="{{$cstatus}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-4">
                    <label for="occupation">Occupation</label>
                    <input type="text" class="form-control" name="occupation" readonly aria-readonly="true" value="{{ucwords($person->occupation)}}">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="lstatus">Living Status</label>
                    <input type="text" class="form-control" name="lstatus" readonly aria-readonly="true" value="{{ucfirst($person->lstatus)}}">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="mobnum">Mobile Number </label>
                    <input type="text" class="form-control" name="mobnum" readonly aria-readonly="true" value="{{$person->mobnum}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-4">
                    <label for="occupation">Registered On:</label>
                    <input type="text" class="form-control" name="occupation" readonly aria-readonly="true" value="{{ date("F j, Y, g:i A", strtotime($person->created_at)) }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <div class="float-md-right text-center">
                        <a href="{{ url('/persons') }}" class="btn btn-primary text-white"><span class="fa fa-arrow-left"></span> Back</a>
                        <a href="{{ url("/persons/$person->id/edit") }}" class="btn btn-warning"><span class="fa fa-pencil"></span> Edit</a>                    
                        {{ Form::hidden('_method', 'DELETE') }}
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete"><span class="fa fa-trash"></span> Delete</button>
                        @include('inc.modal')
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection