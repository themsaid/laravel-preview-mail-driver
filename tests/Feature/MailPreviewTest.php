<?php

namespace Spatie\MailPreview\Tests\Feature;

use Illuminate\Support\Facades\Mail;
use Spatie\MailPreview\Facades\SentMails;
use Spatie\MailPreview\Tests\TestCase;
use Spatie\MailPreview\Tests\TestClasses\TestMailable;

class MailPreviewTest extends TestCase
{
    /** @test */
    public function it_will_write_sent_mails_to_disk()
    {
        Mail::to('john@example.com')->send(new TestMailable());

        $sentMail = SentMails::last();

        $this->assertFileExists($sentMail->htmlPath);
        $this->assertFileExists($sentMail->emlPath);
    }
}
