<?php

/**
 * One Component to Rule Them All
 * 
 * This Livewire Component acts as a Controller
 * and can perform several Actions
 * 
 * Fagner L.
 */

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Events\ContactCreated;

class Contacts extends Component
{
    public $allContacts = [];
    public $isOpen = false;
    public $on = false;
    public $cid = null;
    
    public $name;
    public $email;
    public $address;

    // LIVEWIRE Event listener example (see method success)
    protected $listeners = ['success'];

    // Basic validation example
    protected $rules = [
        'name'    => 'required|min:6',
        'email'   => 'required|email',
        'address' => 'required|min:6'
    ];

    public function mount() {
        $this->allContacts = Contact::all();
    }

    public function submit() {
        $this->validate();

        // One way to reuse a modal without creating a component/action
        // Another commom approach is to create individual Actions and make the form a livewire component
        if (!$this->cid) {
            $c = new Contact();
            $c->name = $this->name;
            $c->email = $this->email;
            $c->address = $this->address;
            $c->save();

            // There's an Laravel Event bound to Contact Model (on create)
            // Check App\Models\Contact
        } else {
            $c = Contact::find($this->cid);
            $c->name = $this->name;
            $c->email = $this->email;
            $c->address = $this->address;
            $c->save();
        }

        $this->emit('success');
    }

    public function deleteContact(Contact $c) {
        $c->delete();
        $this->emit('success');
    }

    // Reusing the modal since I'm making this Livewire Action act as a Controller
    public function editModal(Contact $c) {
        $this->cid = $c->id;
        $this->name = $c->name;
        $this->email = $c->email;
        $this->address = $c->address;
        $this->isOpen = true;
    }

    // This is an example of "Livewire Events"
    public function success() {
        $this->isOpen = false;
        $this->on = true;
        $this->clear();
        $this->mount();
    }

    public function clear() {
        $this->cid = null;
        $this->name = null;
        $this->email = null;
        $this->address = null;
    }
}
