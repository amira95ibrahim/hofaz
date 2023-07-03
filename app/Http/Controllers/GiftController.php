<?php

namespace App\Http\Controllers;

use App\Http\Requests\GiftRequest;
use App\Models\Gift;
use App\Models\SendGift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
//use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Notification;
use App\Notifications\GiftCreatedNotification;



class GiftController extends BaseController
{

    public function index()
    {
        $gifts = Gift::active()->with('giftable')->get();

        return view('front.gift', compact('gifts'));
    }

    // public function generate(GiftRequest $request)
    // {
    //     // Retrieve form inputs
    //     $sender = $request->sender;
    //     $consignee = $request->consignee;
    //     $project_name = $request->project_name;
    //     $email = $request->email;
    //     $phone = $request->phone;
    //     $card = $request->card;

    //     $basename = basename($card); // Extracts the file name with extension ("card2.jpg")
    //     $filename = pathinfo($basename, PATHINFO_FILENAME); // Extracts the file name without extension ("card2")

    //     // Process the selected photo and generate the desired output
    //     $photoPath = '';

    //     if ($filename === 'card1') {
    //         $photoPath = 'images/causes/card1.jpg';
    //     } elseif ($filename === 'card2') {
    //         $photoPath = 'images/causes/card2.jpg';
    //     } elseif ($filename === 'card3') {
    //         $photoPath = 'images/causes/card3.jpg';
    //     } else {
    //         // Handle invalid photo selection
    //         // dd('Invalid photo selection');
    //     }

    //     $fontPath = public_path('fonts/Amiri/Amiri-Regular.ttf');

    //     // Load the image using Intervention Image
    //     $image = Image::make(public_path($photoPath));

    //     // Add text to the image
    //     $image->text($sender, 200, 620, function ($font) use ($fontPath) {
    //         $font->file($fontPath);
    //         $font->size(24);
    //         $font->color('#000000');
    //     });

    //     $image->text($consignee, 200, 1200, function ($font) use ($fontPath) {
    //         $font->file($fontPath);
    //         $font->size(24);
    //         $font->color('#000000');
    //     });

    //     $image->text($project_name, 345, 710, function ($font) use ($fontPath) {
    //         $font->file($fontPath);
    //         $font->size(24);
    //         $font->color('#000000');
    //     });

    //     // Save the modified image
    //     $imageName = $consignee . '.jpg';
    //     $imagePath = public_path('images/card/' . $imageName);
    //     $image->save($imagePath);

    //     // Redirect to a new window to display the saved photo
    //     $savedPhotoUrl = asset('images/card/' . $imageName);

    //     SendGift::create([
    //         'sender' => $sender,
    //         'consignee' => $consignee,
    //         'email' => $email,
    //         'phone' => $phone,
    //         'card' => $imageName, // Save the image file name to the 'card' field
    //     ]);

    //     session(['savedPhotoUrl' => $savedPhotoUrl]);

    //     $emailData = [
    //         'photoUrl' => session('savedPhotoUrl'),
    //     ];

    //     $giftData = [
    //         'sender' => $sender,
    //         'consignee' => $consignee,
    //         'email' => $email,
    //         'phone' => $phone,
    //     ];

    //     Notification::route('mail', $email)->notify(new GiftCreatedNotification($giftData, $photoPath));


    //     return redirect()->back();
    // }


    public function generate(GiftRequest $request)
    {
        // Retrieve form inputs
        $sender = $request->sender;
        $consignee = $request->consignee;
        $project_name = $request->project_name;
        $email = $request->email;
        $phone = $request->phone;
        $card = $request->card;

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

        // Load the image using Intervention Image
      //  $image = Image::make(public_path($photoPath));

        // Add text to the image

        // Save the modified image
        $imageName = $consignee . '.jpg';
        $imagePath = public_path('images/card/' . $imageName);
        //$image->save($imagePath);

        // Redirect to a new window to display the saved photo
        $savedPhotoUrl = asset('images/card/' . $imageName);

        SendGift::create([
            'sender' => $sender,
            'consignee' => $consignee,
            'email' => $email,
            'phone' => $phone,
            'card' => $imageName, // Save the image file name to the 'card' field
        ]);
  // Save the modified image
  $imageName = $consignee . '.jpg';
  $imagePath = asset('images/card/' . $imageName);
 // $image->save($imagePath);

  // Store the generated image URL in a session
  $imageUrl = asset('images/card/' . $imageName);
  session(['imageUrl' => $imageUrl]);
        session(['savedPhotoUrl' => $savedPhotoUrl]);

        $emailData = [
            'photoUrl' => session('savedPhotoUrl'),
        ];

        $giftData = [
            'sender' => $sender,
            'consignee' => $consignee,
            'email' => $email,
            'phone' => $phone,
            'project_name' => $project_name,
        ];

        Notification::route('mail', $email)->notify(new GiftCreatedNotification($giftData, $photoPath));
        session([
            'senderName' => $sender,
            'consignee' => $consignee,
            'photoPath' => $photoPath,
            'project_name' =>$project_name,
        ]);

        // Redirect to a new window to display the saved photo
        return redirect()->back();
    }

    public function showGiftCreatedPopup()
    {
        $senderName = session('senderName');
        $consignee = session('consignee');
        $photoPath = session('photoPath');
        $project_name = session('project_name');

        return view('front.emails.gift-created', compact('senderName', 'consignee', 'photoPath', 'project_name'));
    }

 }
