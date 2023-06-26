<?php

namespace App\Http\Controllers;

use App\Http\Requests\GiftRequest;
use App\Models\Gift;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;



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
        $email = $request->email;
        $phone = $request->phone;
         $card = $request->card;

        $basename = basename($card); // Extracts the file name with extension ("card2.jpg")
        $filename = pathinfo($basename, PATHINFO_FILENAME); // Extracts the file name without extension ("card2")
        // Process the selected photo and generate the desired output
        $photoPath = '';

        if ($card === 'card1') {
            $photoPath = 'card1.jpg';
        } elseif ($card === 'card2') {
            $photoPath = 'card2.jpg';
        } elseif ($card === 'card3') {
            $photoPath = 'card3.jpg';
        } else {
            // Handle invalid photo selection
            // return redirect()->back()->withInput()->withErrors('Invalid photo selection');
        }

        // Load the image using Intervention Image
        $image = Image::make(public_path($photoPath));

        // Add text to the image
        $image->text($sender, 100, 100, function ($font) {
            $font->size(32);
            $font->color('#000000');
        });

        $image->text($consignee, 200, 200, function ($font) {
            $font->size(32);
            $font->color('#000000');
        });

        // $image->text($consignee, 200, 200, function ($font) {
        //     $font->size(32);
        //     $font->color('#000000');
        // });

        // Save the modified image
        $image->save(public_path('images/card'.$photoPath));

        // Continue with the rest of your code
    }



}
