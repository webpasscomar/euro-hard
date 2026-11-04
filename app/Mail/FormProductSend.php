<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormProductSend extends Mailable
{
  use Queueable, SerializesModels;

  public $fullName;
  public $email;
  /**
   * Create a new message instance.
   */
  public function __construct($fullName, $email = null)
  {
    $this->fullName = $fullName;
    $this->email = $email ?? config('mail.from.address', 'info@euro-hard.com.ar');
  }

  /**
   * Get the message envelope.
   */
  public function envelope(): Envelope
  {
    return new Envelope(
      subject: 'EUROHARD',
      from: config('mail.from.address', 'info@euro-hard.com.ar'),
      replyTo: [$this->email],
    );
  }

  /**
   * Get the message content definition.
   */
  public function content(): Content
  {
    return new Content(
      markdown: 'mail.product.send',
      with: [
        'fullName' => $this->fullName,
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
    return [];
  }
}
