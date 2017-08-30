@extends('layout')

@section('title', 'Landing Page')

@section('content')

    <div id="app">
        <div class="container">

            <h1>Testimonials</h1>
            <div class="testimonials-slider">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-slide">
                        <div class="testimonial-name">{{ $testimonial->name }}</div>
                        <div class="testimonial-quote">{{ $testimonial->quote }}</div>
                    </div>
                @endforeach

            </div> <!-- end testimonials-slider -->
        </div>

    </div> <!-- end app -->

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

@endsection
