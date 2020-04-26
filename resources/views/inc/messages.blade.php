@if (count($errors) > 0)
<section class="container">
    @foreach ($errors->all as $error)
    <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
</section>
@endif
@if (session('success'))
<section class="container">
    <div class="alert alert-success">{{ session('success') }}</div>
</section>
@endif
@if (session('error'))
<section class="container">
    <div class="alert alert-danger">{{ session('error') }}</div>
</section>
@endif