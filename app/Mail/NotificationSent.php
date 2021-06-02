<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationSent extends Mailable
{
    use Queueable, SerializesModels;

   // public $staffList;
   // public $class;
    //public $classList;

    /**
     * Create a new message instance.
     *
     * @param $class
     * @param $staffList
     * @param $classList
     */
    public function __construct()
    {
        //$this->staffList = $staffList;
       // $this->$class = $class;
       // $this->classList = $classList;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('notification_send')
        ->subject('RequestTracker of Vacant class');
    }
}
