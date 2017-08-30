<?php

Route::get('/', 'TestimonialsController@home')->name('landing-page');

// Admin Routes
Route::prefix('admin')->group(function () {

    // Testimonials
    Route::get('/testimonials', 'TestimonialsController@index')->name('admin.testimonials.index');
    Route::get('/testimonials/create', 'TestimonialsController@create')->name('admin.testimonials.create');
    Route::post('/testimonials', 'TestimonialsController@store')->name('admin.testimonials.store');
    Route::get('/testimonials/{testimonial}/edit', 'TestimonialsController@edit')->name('admin.testimonials.edit');
    Route::patch('/testimonials/{testimonial}', 'TestimonialsController@update')->name('admin.testimonials.update');
    Route::put('/testimonials/updateAll', 'TestimonialsController@updateAll')->name('admin.testimonials.updateAll');
    Route::delete('/testimonials/{testimonial}', 'TestimonialsController@destroy')->name('admin.testimonials.delete');

    Route::patch('/testimonialsVisibility/{testimonial}', 'TestimonialsController@updateVisibility')->name('admin.testimonials.updateVisibility');
});
