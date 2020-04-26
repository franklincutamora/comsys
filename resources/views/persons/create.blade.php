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
        <div class="card-body">
        {!! Form::open(['action' => 'PersonsController@store', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-row">
                <div class="form-group col-12 col-md-4">
                    <label for="fname">First Name <small class="text-primary">required</small></label>
                    <input type="text" class="form-control" name="fname" required pattern="[a-zA-Z ]+" title="Alphabet letters only.">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="mname">Middle Name</label>
                    <input type="text" class="form-control" name="mname">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="lname">Last Name <small class="text-primary">required</small></label>
                    <input type="text" class="form-control" name="lname" required pattern="[a-zA-Z ]+" title="Alphabet letters only.">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-4">
                    <label for="fname">Nickname</label>
                    <input type="text" class="form-control" name="nname" pattern="[a-zA-Z-_ ]+">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="bday">Birth Date <small class="text-primary">required</small></label>
                    <input type="date" class="form-control" name="bday" required placeholder="mm/dd/yyyy">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="cstatus">Civil Status <small class="text-primary">required</small></label>
                    <select name="cstatus" class="form-control">
                        <option value="si" selected>Single</option>
                        <option value="ma">Married</option>
                        <option value="wi">Widowed</option>
                        <option value="se">Separated</option>
                        <option value="an">Annulled</option>
                        <option value="di">Divorced</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-4">
                    <label for="occupation">Occupation</label>
                    <input type="text" class="form-control" name="occupation" pattern="[a-zA-Z ]+" title="Alphabet letters only.">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="lstatus">Living Status <small class="text-primary">required</small></label>
                    <select name="lstatus" class="form-control">
                        <option value="alive" selected>Alive</option>
                        <option value="deceased">Deceased</option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="mobnum">Mobile Number <small class="text-primary">required</small></label>
                    <input type="tel" class="form-control" name="mobnum" required pattern="\d{11}" title="Input 11 digit number.">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-4">
                    <label for="photo">Upload Photo</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo" title="2 x 2 profile photo">
                        <label class="custom-file-label" for="photo">jpeg, jpg, png</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <div class="float-right">
                        <a href="{{ url('/persons') }}" class="btn btn-primary text-white"><span class="fa fa-arrow-left"></span> Cancel</a>
                        <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Save</button>
                    </div>
                </div>
            </div>
            <script>
                (function(){
                    $("#photo").on("change", function() {
                        let fileName = $(this).val().split("\\").pop();
                        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                    });
                })();
            </script>
        {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection