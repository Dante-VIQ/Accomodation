<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\ContactMessage;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactConfirmationMail extends Mailable
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
        return new Envelope(
            subject: 'Contact Confirmation Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact.confirmation',
        );
    }

        public function build(): self
    {
        return $this->subject('Thank you for contacting Serenity Heights Hotel')
            ->markdown('emails.contact.confirmation')
            ->with([
                'message' => $this->contactMessage,
                'hotelName' => 'Serenity Heights Hotel',
                'hotelPhone' => '+1 (555) 123-4567',
                'hotelEmail' => 'info@serenityheights.com',
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
