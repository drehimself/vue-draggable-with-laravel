@extends('layout')

@section('title', 'Admin')

@section('content')

    <div id="app">
        <div class="container">

            @if (session('success_message'))
                <div class="alert alert-success">
                    {{ session('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h3>View Testimonials (Backend)</h3>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quote</th>
                        <th>Visible</th>
                        <th>Order</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($testimonials as $testimonial)
                    <tr>
                        <td>
                            {{ $testimonial->id }}
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-primary btn-xs mb">Edit</a>
                            <form action="{{ route('admin.testimonials.delete', $testimonial) }}" method="POST">
                                {{ csrf_field() }}
                                {!! method_field('delete') !!}

                                <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                            </form>

                        </td>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ $testimonial->quote }}</td>
                        <td>{{ $testimonial->visible }}</td>
                        <td>{{ $testimonial->order }}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Create Testimonial</a>

            <hr>

            <h3>View Testimonials (Frontend)</h3>

            <table-draggable :testimonials="{{ $testimonials }}"></table-draggable>

            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Create Testimonial</a>

            <hr>

            <h3>Visibility (Backend)</h3>

            <div class="row">
                <div class="col-md-6">
                    <h4>Visible</h4>
                    <ul class="list-group">
                        @foreach ($testimonials as $testimonial)
                            @if ($testimonial->visible)
                            <li class="list-group-item">
                            <div><strong>{{ $testimonial->name }}</strong></div>
                            <div>{{ $testimonial->quote }}</div>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div> <!-- end col-md-6 -->
                <div class="col-md-6">
                    <h4>Not Visible</h4>
                    <ul class="list-group">
                        @foreach ($testimonials as $testimonial)
                            @if (! $testimonial->visible)
                            <li class="list-group-item">
                            <div><strong>{{ $testimonial->name }}</strong></div>
                            <div>{{ $testimonial->quote }}</div>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div> <!-- end col-md-6 -->
            </div>

            <hr>

            <div class="row">
                <h3>Visibility (Frontend)</h3>

                <visibility-draggable :testimonials-visible="{{ $testimonialsVisible }}" :testimonials-not-visible="{{ $testimonialsNotVisible }}"></visibility-draggable>

            </div>


        </div> <!-- end container -->

    </div> <!-- end app -->

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

@endsection
