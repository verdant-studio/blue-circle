<?php

namespace App\Http\Livewire\Front\Components;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $messageContent;

    public $email;

    public $name;

    public $success;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'messageContent' => 'required|min:5',
    ];

    public function submit()
    {
        $this->validate();

        Mail::send(
            'emails.contact',
            [
                'name' => $this->name,
                'email' => $this->email,
                'messageContent' => $this->messageContent,
            ],
            function ($message) {
                $message->from(config('mail.from.address'));
                $message->to(config('mail.to.address'))->subject(__('contact.email.subject', ['name' => config('app.name')]));
            }
        );

        $this->success = __('contact.form.success');

        $this->clear();
    }

    private function clear()
    {
        $this->name = '';
        $this->email = '';
        $this->messageContent = '';
    }

    public function render()
    {
        return view('livewire.front.components.contact-form');
    }
}
