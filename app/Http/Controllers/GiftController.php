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




    public function generateold(GiftRequest $request)
    {
        // Retrieve form inputs
        $sender = $request->sender;
        $consignee = $request->consignee;
        $email = $request->email;
        $phone = $request->phone;
        $card = $request->card;
        $project_name = $request->project_name;
        // dd($request);
        $basename = basename($card); // Extracts the file name with extension ("card2.jpg")
        $filename = pathinfo($basename, PATHINFO_FILENAME); // Extracts the file name without extension ("card2")
        // Process the selected photo and generate the desired output
        $photoPath = '';
        // Process the Arabic text using mbstring functions
        $consignee = mb_convert_encoding($consignee, 'UTF-8', 'auto');
        $project_name = mb_convert_encoding($project_name, 'UTF-8', 'auto');
        $sender = mb_convert_encoding($sender, 'UTF-8', 'auto');


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
        //   dd($photoPath);
        // Load the image using Intervention Image
        $image = Image::make(public_path($photoPath));


        // Load the font file
        $fontPath = config('image.font');

        $image->text(html_entity_decode($consignee), 500, 680, function ($font) use ($fontPath) {
            $font->file($fontPath);
            $font->size(30);
            $font->color('#0000ff');
            $font->align('center');
            $font->valign('middle');
            $font->align('right'); // Set the text alignment to right

        });

        $image->text(html_entity_decode($project_name), 500, 1080, function ($font) use ($fontPath) {
            $font->file($fontPath);
            $font->size(30);
            $font->color('#0000ff');
            $font->align('center');
            $font->valign('middle');
        });

        $image->text($sender, 500, 1250, function ($font) use ($fontPath) {
            $font->file($fontPath);
            $font->size(30);
            $font->color('#0000ff');
            $font->align('center');
            $font->valign('middle');
        });


        // $image->text($project_name, 380, 3200, function ($font) {
        //     $font->size(60);
        //     $font->color('#0000ff');
        // });

        // $image->text($consignee, 380,1710, function ($font) {
        //     $font->size(60);
        //     $font->color('#0000ff');
        // });

        // Save the modified image
        $image->save(public_path('images/card/' . $consignee . '.jpg'));

        // Continue with the rest of your code

        //return redirect()->back();
    }
    public function generate(GiftRequest $request)
{
    // Retrieve form inputs
    $sender = $request->sender;
    $consignee = $request->consignee;
    $email = $request->email;
    $phone = $request->phone;
    $card = $request->card;
    $project_name = $request->project_name;

    // Process the selected photo and generate the desired output
    $basename = basename($card);
    $filename = pathinfo($basename, PATHINFO_FILENAME);
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

    // Load the image using GD
    $image = imagecreatefromjpeg(public_path($photoPath));

    // Set the font path
    $fontPath = config('image.font');

    // Set the font size and color
    $fontSize = 30;
    $fontColor = imagecolorallocate($image, 0, 0, 255);

    // Set the text alignment
    $textAlign = 'center';

    // Set the text position
    $consigneeX = 500;
    $consigneeY = 680;
    $projectNameX = 500;
    $projectNameY = 1080;
    $senderX = 500;
    $senderY = 1250;

    // Process the Arabic text using mbstring functions
    $consignee = mb_convert_encoding($consignee, 'HTML-ENTITIES', 'UTF-8');
    $project_name = mb_convert_encoding($project_name, 'HTML-ENTITIES', 'UTF-8');
    $sender = mb_convert_encoding($sender, 'HTML-ENTITIES', 'UTF-8');

    // Render the text on the image
    imagettftext($image, $fontSize, 0, $consigneeX, $consigneeY, $fontColor, $fontPath, html_entity_decode($consignee));
    imagettftext($image, $fontSize, 0, $projectNameX, $projectNameY, $fontColor, $fontPath, html_entity_decode($project_name));
    imagettftext($image, $fontSize, 0, $senderX, $senderY, $fontColor, $fontPath, html_entity_decode($sender));

    // Save the modified image
    imagejpeg($image, public_path('images/card/' . $consignee . '.jpg'));

    // Destroy the image resource
    // imagedestroy($image);

    // Continue with the rest of your code

    //return redirect()->back();
}

}
