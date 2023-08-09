<?php

namespace App\Http\Controllers;

use App\Http\Requests\GiftRequest;
use App\Models\Gift;
use App\Models\Category;
use App\Models\SendGift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
//use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Notification;
use App\Notifications\GiftCreatedNotification;
use Illuminate\Support\Facades\Session;
 use App\Services\I18N_Arabic_Glyphs;




class GiftController extends BaseController
{
    public function index()
    {
        $gifts = Gift::active()->with('giftable')->get();
      //  dd($gifts[3]->giftable->initial_amount);
        $categories = Category::active()->take(7)->get();
        return view('front.gift', compact('gifts','categories'));
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


    // public function generate(GiftRequest $request)
    // {
    //     // Retrieve form inputs
    //     $sender = $request->sender;
    //     $consignee = $request->consignee;
    //     $project_name = $request->project_name;
    //     $email = $request->email;
    //     $phone = $request->phone;
    //     $card = $request->card;
    //     dd($request->all());
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

    //     // Load the image using Intervention Image
    //     //  $image = Image::make(public_path($photoPath));

    //     // Add text to the image

    //     // Save the modified image
    //     $imageName = $consignee . '.jpg';
    //     $imagePath = public_path('images/card/' . $imageName);
    //     //$image->save($imagePath);

    //     // Redirect to a new window to display the saved photo
    //     $savedPhotoUrl = asset('images/card/' . $imageName);

    //     SendGift::create([
    //         'sender' => $sender,
    //         'consignee' => $consignee,
    //         'email' => $email,
    //         'phone' => $phone,
    //         'card' => $imageName, // Save the image file name to the 'card' field
    //     ]);
    //     // Save the modified image
    //     $imageName = $consignee . '.jpg';
    //     $imagePath = asset('images/card/' . $imageName);
    //     // $image->save($imagePath);

    //     // Store the generated image URL in a session
    //     $imageUrl = asset('images/card/' . $imageName);
    //     session(['imageUrl' => $imageUrl]);
    //     session(['savedPhotoUrl' => $savedPhotoUrl]);

    //     $emailData = [
    //         'photoUrl' => session('savedPhotoUrl'),
    //     ];

    //     $giftData = [
    //         'sender' => $sender,
    //         'consignee' => $consignee,
    //         'email' => $email,
    //         'phone' => $phone,
    //         'project_name' => $project_name,
    //     ];

    //     Notification::route('mail', $email)->notify(new GiftCreatedNotification($giftData, $photoPath));
    //     session([
    //         'senderName' => $sender,
    //         'consignee' => $consignee,
    //         'photoPath' => $photoPath,
    //         'project_name' => $project_name,
    //     ]);

    //     // Redirect to a new window to display the saved photo
    //     return redirect()->back();
    // }


    public function generate(Request $request)
    {
        // Retrieve form inputs
        $senderName = $request->sender;
        $consignee = $request->reciever;
        $project_name = $request->project_name;
        $email = $request->email;
        $phone = $request->phone;
        $card = $request->card;
        $basename = basename($card);
        // print_r($request->all());
        $basename = basename($card); // Extracts the file name with extension ("card2.jpg")
        $filename = pathinfo($basename, PATHINFO_FILENAME); // Extracts the file name without extension ("card2")

        // Process the selected photo and generate the desired output
        $photoPath = '';

        // if ($filename === 'card1') {
        //     $photoPath = 'images/causes/card1.jpg';
        // } elseif ($filename === 'card2') {
        //     $photoPath = 'images/causes/card2.jpg';
        // } elseif ($filename === 'card3') {
        //     $photoPath = 'images/causes/card3.jpg';
        // } else {
        //     // Handle invalid photo selection
        // }

        // Save the modified image
        $imageName = $consignee . '.jpg';

        // Redirect to a new window to display the saved photo
        $savedPhotoUrl = asset('images/card/' . $imageName);

        SendGift::create([
            'sender' => $senderName,
            'consignee' => $consignee,
            'email' => $email,
            'phone' => $phone,
            'card' => $imageName, // Save the image file name to the 'card' field
        ]);

        //session(['savedPhotoUrl' => $savedPhotoUrl]);
        Session::put('savedPhotoUrl', $savedPhotoUrl);
        Session::put('senderName', $senderName);
        Session::put('consignee', $consignee);
        Session::put('card', $filename);
        Session::put('project_name', $project_name);
        Session::put('model', 'gift');

        $emailData = [
            'photoUrl' => Session::get('savedPhotoUrl'),
        ];

        $giftData = [
            'sender' => $senderName,
            'consignee' => $consignee,
            'email' => $email,
            'phone' => $phone,
            'project_name' => $project_name,
        ];

        //Notification::route('mail', $email)->notify(new GiftCreatedNotification($giftData, $photoPath));

       // Path to the image
    $imagePath = public_path('images/causes/'.$filename.'.jpg');

    // Load the image
    $image = imagecreatefromjpeg($imagePath);

    // Allocate a color for the text (in this case, black)
    // $color = imagecolorallocate($image, 0, 0, 0);
    $red = hexdec("07");
    $green = hexdec("3B");
    $blue = hexdec("56");

    $color = imagecolorallocate($image, $red, $green, $blue);
    // Set the path to your font file
    $fontPath = public_path('fonts/Amiri/Amiri-Bold.ttf');

    // Use ArPHP to correctly format the Arabic text
    $name=$consignee;
	$Arabic = new I18N_Arabic_Glyphs('Glyphs');
	$consignee = $Arabic->utf8Glyphs($consignee);
	$project_name = $Arabic->utf8Glyphs($project_name);
	$senderName = $Arabic->utf8Glyphs($senderName);


    // Add the text to the image
    imagettftext($image, 40, 0,500, 700, $color, $fontPath, $consignee);
    imagettftext($image, 40, 0,500, 1100, $color, $fontPath, $project_name);
    imagettftext($image, 40, 0,500, 1300, $color, $fontPath, $senderName);

    // Path to save the image
    $photoPath = public_path('images/causes/'.$name.'.jpg');

    // Save the image to a file
    imagejpeg($image, $photoPath);

    // Free up memory
    // imagedestroy($image);
    return true;
    // return view('front.gift-created', compact('senderName', 'consignee', 'photoPath', 'project_name'));
    }

    public function showGiftCreatedPopup()
    {
        $senderName = Session::get('senderName')??"المرسل";
        $consignee = Session::get('consignee')??"المرسل اليه";
        $photoPath = Session::get('card') ?? 'card1';
        $project_name = Session::get('project_name')??"اسم المشروع";
        $email = Session::get('email') ?? "";
        $phone = Session::get('phone') ?? "";

// dd(Session::get('project_name'));

        // Path to the image
        $imagePath = public_path('images/causes/'.$photoPath.'.jpg');

        // Load the image
        $image = imagecreatefromjpeg($imagePath);

        // Allocate a color for the text (in this case, black)
        // $color = imagecolorallocate($image, 0, 0, 0);
        $red = hexdec("07");
        $green = hexdec("3B");
        $blue = hexdec("56");

        $color = imagecolorallocate($image, $red, $green, $blue);
        // Set the path to your font file
        $fontPath = public_path('fonts/Amiri/Amiri-Bold.ttf');

        // Use ArPHP to correctly format the Arabic text
        $name=$consignee;
        $Arabic = new I18N_Arabic_Glyphs('Glyphs');
        $consignee = $Arabic->utf8Glyphs($consignee);
        $project_name = $Arabic->utf8Glyphs($project_name);
        $senderName = $Arabic->utf8Glyphs($senderName);


        // Add the text to the image
        imagettftext($image, 40, 0,320, 700, $color, $fontPath, $consignee);
        imagettftext($image, 40, 0,200, 1100, $color, $fontPath, $project_name);
        imagettftext($image, 40, 0,320, 1300, $color, $fontPath, $senderName);

        // Path to save the image
        $photoPath = public_path('images/causes/'.$name.'.jpg');

        // Save the image to a file
        imagejpeg($image, $photoPath);

        // Free up memory
        imagedestroy($image);

        return view('front.emails.gift-created', compact('senderName', 'consignee', 'name', 'project_name'));
    }
public function showGiftCreatedPopup55(GiftRequest $request){
     // Retrieve form inputs
     $senderName = $request->sender;
     $consignee = $request->consignee;
     $project_name = $request->project_name;
     $email = $request->email;
     $phone = $request->phone;
     $card = $request->card;
     $basename = basename($card);
     //dd($request->all());
     $basename = basename($card); // Extracts the file name with extension ("card2.jpg")
     $filename = pathinfo($basename, PATHINFO_FILENAME); // Extracts the file name without extension ("card2")

     // Process the selected photo and generate the desired output
     $photoPath = '';

    //  if ($filename === 'card1') {
    //      $photoPath = 'images/causes/card1.jpg';
    //  } elseif ($filename === 'card2') {
    //      $photoPath = 'images/causes/card2.jpg';
    //  } elseif ($filename === 'card3') {
    //      $photoPath = 'images/causes/card3.jpg';
    //  } else {
    //      // Handle invalid photo selection
    //  }

     // Save the modified image
     $imageName = $consignee . '.jpg';

     // Redirect to a new window to display the saved photo
     $savedPhotoUrl = asset('images/card/' . $imageName);

     SendGift::create([
         'sender' => $senderName,
         'consignee' => $consignee,
         'email' => $email,
         'phone' => $phone,
         'card' => $imageName, // Save the image file name to the 'card' field
     ]);

     //session(['savedPhotoUrl' => $savedPhotoUrl]);
     Session::put('savedPhotoUrl', $savedPhotoUrl);
     Session::put('senderName', $senderName);
     Session::put('consignee', $consignee);
     Session::put('photoPath', $photoPath);
     Session::put('project_name', $project_name);
     $emailData = [
         'photoUrl' => Session::get('savedPhotoUrl'),
     ];

     $giftData = [
         'sender' => $senderName,
         'consignee' => $consignee,
         'email' => $email,
         'phone' => $phone,
         'project_name' => $project_name,
     ];

     //Notification::route('mail', $email)->notify(new GiftCreatedNotification($giftData, $photoPath));

    // Path to the image
 $imagePath = public_path('images/causes/card2.jpg');

 // Load the image
 $image = imagecreatefromjpeg($imagePath);

 // Allocate a color for the text (in this case, black)
 // $color = imagecolorallocate($image, 0, 0, 0);
 $red = hexdec("07");
 $green = hexdec("3B");
 $blue = hexdec("56");

 $color = imagecolorallocate($image, $red, $green, $blue);
 // Set the path to your font file
 $fontPath = public_path('fonts/Amiri/Amiri-Bold.ttf');

 // Use ArPHP to correctly format the Arabic text
 $name=$consignee;
 $Arabic = new I18N_Arabic_Glyphs('Glyphs');
 $consignee = $Arabic->utf8Glyphs($consignee);
 $project_name = $Arabic->utf8Glyphs($project_name);
 $senderName = $Arabic->utf8Glyphs($senderName);


 // Add the text to the image
 imagettftext($image, 40, 0,500, 700, $color, $fontPath, $consignee);
 imagettftext($image, 40, 0,500, 1100, $color, $fontPath, $project_name);
 imagettftext($image, 40, 0,500, 1300, $color, $fontPath, $senderName);

 // Path to save the image
 $photoPath = public_path('images/causes/'.$name.'.jpg');

 // Save the image to a file
 imagejpeg($image, $photoPath);

 // Free up memory
  imagedestroy($image);

 return view('front.emails.gift-created', compact('senderName', 'consignee', 'photoPath', 'project_name'));
}
}
