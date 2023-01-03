<?php

namespace App\Http\Controllers;

use App\Models\ImageGallery;
use App\Models\TeachersGallery;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //

    public function index()
    {
        $images = 1;//ImageGallery::take(6)->get();
        $teacher_details = 2;//TeachersGallery::take(4)->get();

        return view('front.welcome', ([
            'images' => $images,
            'teacher_details' => $teacher_details,
        ]));

    }


    public function contactUs(){
        return view('front.contact-us');
    }


    public function ourTeachers(){

        $teacher_details = TeachersGallery::get();
        return view('front.our-teachers', ['teacher_details' => $teacher_details]);
    }

    public function aboutUs(){
        $images = ImageGallery::take(6)->get();
        $teacher_details = TeachersGallery::take(4)->get();
        return view('front.about-us', ([
            'images' => $images,
            'teacher_details' => $teacher_details
        ]));
    }

    public function testimonials(){

        $testimonials = Testimonial::get();
        return view('front.testimonials', ([

            'testimonials' => $testimonials
        ]));
    }
    public function gallery(){

        $images = ImageGallery::get();
        return view('front.gallery', ([

            'images' => $images
        ]));
    }

}
