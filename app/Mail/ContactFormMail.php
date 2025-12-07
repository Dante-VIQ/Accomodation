<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\ContactMessage;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactMessage;

    /**
     * Create a new message instance.
     */
    public function __construct(ContactMessage $contactMessage)
    {
        $this->contactMessage = $contactMessage;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(subject: 'New Appointment Request from ' . $this->contactMessage->name, replyTo: [new Address($this->contactMessage->email, $this->contactMessage->name)]);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(markdown: 'emails.contact.admin', with: ['contactMessage' => $this->contactMessage]);
    }

    /**
     * Build the message.
     */
    public function build(): self
    {
        return $this->subject('New Contact Form Submission: ' . $this->contactMessage->subject)
            ->markdown('emails.contact.admin')
            ->with([
                'message' => $this->contactMessage,
                'hotelName' => 'Villaveh Gameview',
                'hotelPhone' => '+4795065157',
                'hotelEmail' => 'veronicamuthoniholtet@gmail.com',
            ]);
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
