# TALL stack

Minimalist example of TALL stack with only 2 files:<br><br>
1 - Livewire Component: App\Http\Livewire\Contacts<br>
2 - Livewire View: resources\views\livewire\contacts.blade.php<br>
<br><br>
To quickly generate a package ready for deployment go to Github Actions and download the artifact created by the workflow.<br>
Extract it and run: php artisan serve<br>
Check http://127.0.0.1:8000<br><br>
To build it yourself, clone then run: 
<br><br>
composer install<br>
npm install<br>
npm run dev<br>
php artisan migrate<br>
php artisan db:seed<br>
php artisan serve<br>
<br>
Check http://127.0.0.1:8000
