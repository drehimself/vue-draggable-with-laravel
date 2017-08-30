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


            <h3>Edit Testimonial</h3>

            <div class="spacer"></div>

            <form class="add-testimonial form-horizontal" method="post" action="{{ route('admin.testimonials.update', $testimonial) }}">

                {{ csrf_field() }}
                {!! method_field('patch') !!}

                <div class="form-group m-b-lg">
                    <label class="control-label col-lg-2" for="name">Name <span class="asterisk">*</span></label>
                    <div class="controls col-lg-6">
                        <input type="text" name="name" id="name" value="{{ old('name', $testimonial->name) }}" class="form-control input-xlarge" required>
                    </div> <!-- /controls -->
                </div> <!-- /form-group -->



                <div class="form-group m-b-lg">
                    <label class="control-label col-lg-2" for="quote">Quote <span class="asterisk">*</span></label>
                    <div class="controls col-lg-6">
                        <textarea name="quote" cols="40" rows="8" id="quote" class="form-control input-xlarge" required>{{ old('quote', $testimonial->quote) }}</textarea>
                    </div>
                </div> <!-- /controls -->

                <div class="form-group m-b-lg">
                    <label class="control-label col-lg-2" for="order">Order</label>
                    <div class="controls col-lg-6">
                        <input type="text" name="order" id="order" value="{{ old('order', $testimonial->order) }}" class="form-control input-xlarge">
                    </div> <!-- /controls -->
                </div> <!-- /form-group -->

                <div class="form-group m-b-lg">
                    <label class="control-label col-lg-2">Visible? <span class="asterisk">*</span></label>

                    <div class="controls col-lg-6">
                        <input type="radio" name="visible" id="yes" value="1" {{ $testimonial->visible == 1 ? 'checked' : null }}>
                        <label for="yes">Yes</label>

                        <br>

                        <input type="radio" name="visible" id="no" value="0" {{ $testimonial->visible == 0 ? 'checked' : null }}>
                        <label for="no">No</label>

                    </div> <!-- /controls -->
                </div> <!-- /form-group -->

                <div class="form-group">
                    <div class="col-lg-2"></div>
                    <div class="controls col-lg-6">
                        <div class="form-actions">
                            <button type="submit" id="create-testimonial" class="btn btn-primary btn-lg"> Update Testimonial</button>
                        </div>

                    </div> <!-- end controls -->
                </div>

            </form>
        </div> <!-- end container -->

    </div> <!-- end app -->

@endsection
