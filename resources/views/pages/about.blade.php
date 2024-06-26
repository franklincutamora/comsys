@extends('layouts.app')
@section('content')
<section class="container">
    <h1>{{ $title }}</h1>
    @if(count($services) > 0)
    <ul>
        @foreach($services as $service) 
        <li>{{ $service }}</li>
        @endforeach
    </ul>
    @endif
    <example-component></example-component>
</section>
@endsection 