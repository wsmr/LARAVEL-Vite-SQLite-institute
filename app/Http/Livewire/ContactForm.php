<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;
    
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ];
    
    public function submit()
    {
        $this->validate();
        
        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
            'status' => 'new',
        ]);
        
        session()->flash('success', 'Your message has been sent successfully. We will get back to you soon.');
        
        $this->reset(['name', 'email', 'phone', 'subject', 'message']);
    }
    
    public function render()
    {
        return view('livewire.contact-form');
    }
}
