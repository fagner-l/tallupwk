<?php

namespace Database\Seeders;

use App\Models\Contact;

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact          = new Contact();
        $contact->name    = 'Fagner Lara';
        $contact->email   = 'fagner@w2net.technology';
        $contact->address = 'Southern Brazil ;-)';
        $contact->save();

        $contact          = new Contact();
        $contact->name    = 'Lenora J';
        $contact->email   = 'johnson.lenora@example.com';
        $contact->address = 'Contact Address St, 100';
        $contact->save();

        $contact          = new Contact();
        $contact->name    = 'Donna Tromp';
        $contact->email   = 'tromp.donna@example.org';
        $contact->address = 'Contact Address St, 100';
        $contact->save();

        $contact          = new Contact();
        $contact->name    = 'Walter Devon';
        $contact->email   = 'devon.walter@example.org';
        $contact->address = 'Contact Address St, 100';
        $contact->save();
    }
}
