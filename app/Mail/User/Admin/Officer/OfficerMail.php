<?php

namespace App\Mail\User\Admin\Officer;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OfficerMail extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }


    /**
     * Build
     *
     * @return OfficerMail
     */
    public function build()
    {
        return $this->from('officialgorent@gmail.com', 'Akun Petugas Pembayaran SPP')
            ->subject($this->data['subject'])
            ->view('vendor.template.email.index')
            ->with('data', $this->data);
    }
}
