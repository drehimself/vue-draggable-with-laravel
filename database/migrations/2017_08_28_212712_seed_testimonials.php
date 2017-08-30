<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedTestimonials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('testimonials')->insert([
            [
                'name' => 'Michael Jordan',
                'quote' => 'I can accept failure, everyone fails at something. But I can’t accept not trying',
                'visible' => 1,
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Wayne Gretzky',
                'quote' => 'You miss 100 percent of the shots you don’t take.',
                'visible' => 1,
                'order' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dr. Seuss',
                'quote' => 'Don’t cry because it’s over, smile because it happened.',
                'visible' => 1,
                'order' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Albert Einstein',
                'quote' => 'Try not to become a man of success, but rather try to become a man of value.',
                'visible' => 1,
                'order' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bob Marley',
                'quote' => 'The truth is, everyone is going to hurt you. You just got to find the ones worth suffering for.',
                'visible' => 1,
                'order' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Will Smith',
                'quote' => 'Don’t chase people. Be yourself, do your own thing, and work hard. The right people… the ones who really belong in your life, will come to you. And stay.',
                'visible' => 1,
                'order' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Henry Ford',
                'quote' => 'If you think you can, you can. And if you think you can’t, you’re right.',
                'visible' => 1,
                'order' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Barack Obama',
                'quote' => 'Change will not come if we wait for some other person or some other time. We are the ones we’ve been waiting for. We are the change that we seek.',
                'visible' => 1,
                'order' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
