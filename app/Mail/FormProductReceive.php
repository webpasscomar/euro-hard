<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormProductReceive extends Mailable
{
  use Queueable, SerializesModels;
  public $contact;
  /**
   * Create a new message instance.
   */
  public function __construct($contact)
  {
    $this->contact = $contact;
  }

  /**
   * Get the message envelope.
   */
  public function envelope(): Envelope
  {
    return new Envelope(
      subject: 'Contacto - Productos',
      from: config('mail.form.products'),
    );
  }

  /**
   * Get the message content definition.
   */
  public function content(): Content
  {
    return new Content(
      markdown: 'mail.product.receive',
      with: [
        'contact' => $this->contact,
      ]
    );
  }

  /**
   * Get the attachments for the message.
   *
   * @return array<int, \Illuminate\Mail\Mailables\Attachment>
   */
  public function attachments(): array
  {
    if (isset($this->contact['image'])) {
      return [
        Attachment::fromPath($this->contact['image']->getRealPath())
          ->as($this->contact['image']->getClientOriginalName())
          ->withMime($this->contact['image']->getMimeType()),
      ];
    } else {
      return [];
    }
  }
}
