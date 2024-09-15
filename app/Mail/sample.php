<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $customerName;
    public $items;
    public $totalAmount;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customerName, $items, $totalAmount)
    {
        $this->customerName = $customerName;
        $this->items = $items;
        $this->totalAmount = $totalAmount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.invoice')
                    ->subject('Your Invoice from ' . config('app.name'))
                    ->with([
                        'customerName' => $this->customerName,
                        'items' => $this->items,
                        'totalAmount' => $this->totalAmount,
                    ]);
    }
}