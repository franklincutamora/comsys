@extends('layouts.app')
@section('content')
<section class="container">
    <h1 class="clearfix">Edit Person Details</h1>
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
        {!! Form::open(['action' => ['Persons\PersonsController@update', $person->id], 'enctype' => 'multipart/form-data', 'method' => 'post']) !!}
           {{ Form::hidden('_method', 'PUT') }}
            <div class="form-row">
                <div class="form-group col-12 col-md-4">
                    <label for="fname">First Name <small class="text-primary">required</small></label>
                   <input type="text" class="form-control" name="fname" required pattern="[a-zA-Z ]+" value="{{$person->fname}}" title="Alphabet letters only.">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="mname">Middle Name</label>
                    <input type="text" class="form-control" name="mname" value="{{$person->mname}}">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="lname">Last Name <small class="text-primary">required</small></label>
                    <input type="text" class="form-control" name="lname" required pattern="[a-zA-Z ]+" value="{{$person->lname}}" title="Alphabet letters only.">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-4">
                    <label for="fname">Nickname</label>
                    <input type="text" class="form-control" name="nname" pattern="[a-zA-Z-_ ]+" value="{{$person->nname}}">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="bday">Birth Date <small class="text-primary">required</small></label>
                    <input type="date" class="form-control" name="bday" required placeholder="mm/dd/yyyy" value="{{$person->bday}}">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="cstatus">Civil Status <small class="text-primary">required</small></label>
                    @php
                        $cstatusarr = [
                            'si' => 'Single',
                            'ma' => 'Married',
                            'wi' => 'Widowed',
                            'se' => 'Separated',
                            'an' => 'Annulled',
                            'di' => 'Divorced'
                        ];
                    @endphp
                    {{ Form::select('cstatus', $cstatusarr, $person->cstatus, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-4">
                    <label for="occupation">Occupation</label>
                    <input type="text" class="form-control" name="occupation" pattern="[a-zA-Z ]+" value="{{$person->occupation}}" title="Alphabet letters only.">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="lstatus">Living Status <small class="text-primary">required</small></label>
                    @php
                        $lstatusarr = [
                            'alive' => 'Alive',
                            'deceased' => 'Deceased'
                        ];
                    @endphp
                    {{ Form::select('lstatus', $lstatusarr, $person->lstatus, ['class' => 'form-control']) }}
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="mobnum">Mobile Number <small class="text-primary">required</small></label>
                    <input type="tel" class="form-control" name="mobnum" required pattern="\d{11}" value="{{$person->mobnum}}" title="Input 11 digit number.">
                </div>
            </div>
            <upload-photo-component state="Change"></upload-photo-component>
            <div class="form-row">
                <div class="form-group col-12">
                    <div class="float-md-right text-center">
                        <a href="{{ url('/persons').'/'.$person->id }}" class="btn btn-primary"><span class="fa fa-backward"></span> Discard Changes</a>
                        <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Save Updates</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection