<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingSuccess extends Mailable
{
    use Queueable, SerializesModels;

    protected $emailData;

    /**
     * Create a new message instance.
     *
     * @param  mixed  $emailData
     */
    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Danh sách các ảnh bạn muốn đính kèm
        $images = [
            'top-header.png' => public_path('storage/images/top-header.png'),
            'logo6d1d.png' => public_path('storage/images/logo6d1d.png'),
            'top.png' => public_path('storage/images/top.png'),
            'FLIGHT.png' => public_path('storage/images/FLIGHT.png'),
            'instagram2x.png' => public_path('storage/images/instagram2x.png'),
            'facebook2x.png' => public_path('storage/images/facebook2x.png'),
        ];

        // Đính kèm các ảnh và gán CID
        foreach ($images as $cid => $imagePath) {
            if (file_exists($imagePath)) {
                // Đính kèm ảnh và gán CID
                $this->attach($imagePath, [
                    'as' => $cid,            // Đặt tên file (cid) trong email
                    'mime' => 'image/png',   // Loại MIME của file
                    'encoding' => 'base64',  // Đảm bảo ảnh được mã hóa base64
                    'cid' => $cid            // Gán CID để tham chiếu trong email
                ]);
            }
        }

        return $this->subject('Booking Confirmation')
            ->view('client.email.emailviet.new-email')  // View của email
            ->with(['data' => $this->emailData]);       // Truyền dữ liệu vào view
    }



    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Success',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // Nếu cần đính kèm ảnh
            public_path('storage/images/logo6d1d.png'), // Đính kèm ảnh .png
        ];
    }
}
