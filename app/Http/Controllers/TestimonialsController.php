<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TestimonialsController extends Controller
{
    /**
     * Display the home page
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $testimonials = Testimonial::where('visible', true)->orderBy('order')->get();

        return view('landing-page')->with([
            'testimonials' => $testimonials,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->get();

        $testimonialsVisible = $testimonials->filter(function ($testimonial, $key) {
            return $testimonial->visible;
        })->values();

        $testimonialsNotVisible = $testimonials->filter(function ($testimonial, $key) {
            return ! $testimonial->visible;
        })->values();

        return view('index')->with([
            'testimonials' => $testimonials,
            'testimonialsVisible' => $testimonialsVisible,
            'testimonialsNotVisible' => $testimonialsNotVisible,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'quote' => 'required',
            'order' => 'required|numeric',
            'visible' => 'required|boolean',
        ]);

        Testimonial::create($request->all());

        return redirect()->route('admin.testimonials.index')->with('success_message', 'Testimonial Created Successfully!');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('edit')->with('testimonial', $testimonial);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $this->validate($request, [
            'name' => 'required',
            'quote' => 'required',
            'order' => 'required|numeric',
            'visible' => 'required|boolean',
        ]);

        $testimonial->fill($request->all())->save();

        return redirect()->route('admin.testimonials.index')
                         ->with('success_message', 'Testimonial Updated Successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request)
    {
        // Testimonial::truncate();

        // foreach ($request->testimonials as $testimonial) {
        //     Testimonial::create([
        //         'id' => $testimonial['id'],
        //         'name' => $testimonial['name'],
        //         'quote' => $testimonial['quote'],
        //         'visible' => true,
        //         'order' => $testimonial['order'],
        //     ]);
        // }

        $testimonials = Testimonial::all();

        foreach ($testimonials as $testimonial) {
            $testimonial->timestamps = false;
            $id = $testimonial->id;
            foreach ($request->testimonials as $testimonialFrontEnd) {
                if ($testimonialFrontEnd['id'] == $id) {
                    $testimonial->update(['order' => $testimonialFrontEnd['order']]);
                }
            }
        }

        return response('Update Successful.', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function updateVisibility(Request $request, Testimonial $testimonial)
    {
        $testimonial->visible = $request->visible;
        $testimonial->save();

        return response('Update Successful.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('success_message', 'Testimonial Deleted Successfully.');
    }
}
