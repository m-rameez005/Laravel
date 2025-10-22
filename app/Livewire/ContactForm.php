<?php


namespace App\Livewire;

use App\Mail\ContactUsMail;
use illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ];

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    // Change 'send' to 'submit'
    public function submit()
    {
        $validatedDate = $this->validate();
        
        try{
        // send email
        Mail::to('psc.developer2@gmail.com')->send(new ContactUsMail($validatedDate));
        session()->flash('success', 'Message sent successfully!');
        } catch (\Throwable $th) {
            session()->flash('error', 'Failed to send message. Please try again later.');
        }
        $this->reset();

    }
}










// namespace App\Livewire;

// use Livewire\Component;

// class ContactForm extends Component
// {
//     public $name;
//     public $email;
//     public $message;

//     protected $rules = [
//         'name' => 'required|string|max:255',
//         'email' => 'required|email',
//         'message' => 'required|string',
//     ];
//     public function render()
//     {
//         return view('livewire.contact-form');
//     }
//     public function updated($propertyName)
//     {
//         $this->validateOnly($propertyName);
//     }
//     public function send(){
//         $validatedDate = $this->validate();
//         // send email

//         session()->flash('success', 'Message sent successfully!');
//         $this->reset();
//     }
// }
