<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GiftCreatedNotification extends Notification
{
    use Queueable;

    protected $giftData;
    protected $photoPath;

    public function __construct($giftData, $photoPath)
    {
        $this->giftData = $giftData;
        $this->photoPath = $photoPath;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $photoPath = $this->photoPath;
        $senderName = $this->giftData['sender'];

        return (new MailMessage)
            ->subject('Gift Created')
            ->view('front.emails.gift-created', [
                'giftData' => $this->giftData,
                'senderName' => $senderName,
                'consignee' => $this->giftData['consignee'],
                'photoPath' => $photoPath,
                'project_name' => $this->giftData['project_name'],
            ])
            ->attach($photoPath, [
                'as' => 'gift.jpg',
                'mime' => 'image/jpeg',
            ]);
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
