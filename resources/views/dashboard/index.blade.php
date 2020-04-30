@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-medium">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success text-white">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You're logged in!
                </div>
            </div>
        </div>
    </div>
    <card-total-members :person-total="{{ $personTotal }}"></card-total-members>
    <div class="row justify-content-center mb-medium">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cases</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="lead">Open Cases</div>
                            <div>
                                1
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="lead">Closed Cases</div>
                            <div>
                                2
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="lead">Pending Cases</div>
                            <div>
                                3
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">News / Events</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="lead">Events</div>
                            <div>
                                4
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="lead">News / Announcements</div>
                            <div>
                                5
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
