<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentSchedule extends Mailable {
	use Queueable, SerializesModels;

	public array $data;
	/**
	 * Create a new message instance.
	 */
	public function __construct(array $data) {
		$this->data = $data;
	}

	/**
	 * Get the message envelope.
	 */
	public function envelope(): Envelope {
		return new Envelope(
			subject: 'Appointment Schedule',
			from: new Address(
				env('MAIL_FROM_ADDRESS'),
				'Testing Admission',
			),
		);
	}

	/**
	 * Get the message content definition.
	 */
	public function content(): Content {
		return new Content(
			markdown: 'emails.admission',
		);
	}

	/**
	 * Get the attachments for the message.
	 *
	 * @return array<int, \Illuminate\Mail\Mailables\Attachment>
	 */
	public function attachments(): array {
		return [];
	}
}
