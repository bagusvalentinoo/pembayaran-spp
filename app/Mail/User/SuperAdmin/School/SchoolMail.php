<?php

namespace App\Mail\User\SuperAdmin\School;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SchoolMail extends Mailable
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
     * @return SchoolMail
     */
    public function build()
    {
        return $this->from('officialgorent@gmail.com', 'Akun Pembayaran SPP')
            ->subject($this->data['subject'])
            ->view('vendor.template.email.index')
            ->with('data', $this->data);
    }
}
