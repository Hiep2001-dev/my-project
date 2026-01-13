<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderPlacedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Truyền đơn hàng vào email.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build email.
     */
    public function build()
    {
        return $this->subject('Xác nhận đặt hàng tại Footstore')
            ->view('emails.order_placed')
            ->with(['order' => $this->order]);
    }
}
