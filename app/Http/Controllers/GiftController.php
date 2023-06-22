<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Intervention\Image\Facades\Image;



class GiftController extends BaseController
{

    public function index()
    {

        $gifts = Gift::active()->with('giftable')->get();

        return view('front.gift', compact('gifts'));
    }


    public function generate()
    {

        $image = Image::make(public_path('images/photo.jpg'));

        $image->text('John Doe', 100, 50, function ($font) {
            $font->file(public_path('fonts/arial.ttf'));
            $font->size(24);
            $font->color('#000000');
        });

        $image->text('project name', 100, 100, function ($font) {
            $font->file(public_path('fonts/arial.ttf'));
            $font->size(24);
            $font->color('#000000');
        });

        $image->text('sender', 200, 200, function ($font) {
            $font->file(public_path('fonts/arial.ttf'));
            $font->size(24);
            $font->color('#000000');
        });

        $image->save('path/to/new/image.jpg');
    }
}
