@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Portfolio</h1>

    @foreach($portfolios as $portfolio)
    <div class="portfolio-item">
        <h2>{{ $portfolio->title }}</h2>
        <p>{{ $portfolio->description }}</p>
        @if($portfolio->image)
            <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}">
        @endif
        @if($portfolio->link)
            <a href="{{ $portfolio->link }}">Project Link</a>
        @endif
    </div>
    @endforeach
</div>
@endsection
