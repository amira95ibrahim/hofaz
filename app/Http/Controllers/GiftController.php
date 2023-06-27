<?php

namespace App\Http\Controllers;

use App\Http\Requests\GiftRequest;
use App\Models\Gift;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use I18N_Arabic;




class GiftController extends BaseController
{

    public function index()
    {
        $gifts = Gift::active()->with('giftable')->get();

        return view('front.gift', compact('gifts'));
    }

    public function generate(GiftRequest $request)
    {
        // Retrieve form inputs
        $sender = $request->sender;
        $consignee = $request->consignee;
        $project_name = $request->project_name;
        $email = $request->email;
        $phone = $request->phone;
        $card = $request->card;
        // dd($request);
        $basename = basename($card); // Extracts the file name with extension ("card2.jpg")
        $filename = pathinfo($basename, PATHINFO_FILENAME); // Extracts the file name without extension ("card2")
        // Process the selected photo and generate the desired output
        $photoPath = '';

        if ($filename === 'card1') {
            $photoPath = 'images/causes/card1.jpg';
        } elseif ($filename === 'card2') {
            $photoPath = 'images/causes/card2.jpg';
        } elseif ($filename === 'card3') {
            $photoPath = 'images/causes/card3.jpg';
        } else {
            // Handle invalid photo selection
            // dd('Invalid photo selection');
        }

        $fontPath = public_path('fonts/static/Cairo-Regular.ttf');
        //   dd($photoPath);
        // Load the image using Intervention Image
        $image = Image::make(public_path($photoPath));

        // Add text to the image
        $image->text($sender, 200, 620, function ($font) use ($fontPath) {
            $font->file($fontPath);
            $font->size(24);
            $font->color('#000000');
        });

        $image->text($consignee, 200, 1200, function ($font) use ($fontPath) {
            $font->file($fontPath);
            $font->size(24);
            $font->color('#000000');
        });

        $image->text($project_name, 345, 710, function ($font) use ($fontPath) {
            $font->file($fontPath);
            $font->size(24);
            $font->color('#000000');
        });

        // Save the modified image
        $image->save(public_path('images/card/' . $consignee . '.jpg'));

        // Redirect to a new window to display the saved photo
        $savedPhotoUrl = asset('images/card/' . $consignee . '.jpg');

        session(['savedPhotoUrl' => $savedPhotoUrl]);

        return redirect()->back();
    }
}
