<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('data', function () {
    $files = scandir(__DIR__ . '/../data/');
    for ($i = 2; $i < count($files); $i++) {
        $d = file_get_contents(__DIR__ . '/../data/' . $files[$i]);
        echo "reading " . __DIR__ . '/../data/' . $files[$i] . "\n";
        $r = json_decode($d);
        foreach ($r as $value) {
            $n = new \App\Models\PublicBook();
            $n->uid = $value->id;
            $n->title = $value->title;
            $n->author = $value->author;
            $n->photo = $value->info;
            $n->save();
            foreach ($value->links as $link) {
                $l = new \App\Models\Link();
                $l->title = $link->link;
                $l->link = $link->title;
                $l->public_book_id = $n->id;
                $l->save();
            }
        }
        echo  __DIR__ . '/../data/' . $files[$i] . "Published\n";
    }
});


Artisan::command('user {pass} {email}', function ($pass, $email) {
    $user = new \App\Models\User();
    if ($email == null) {
        $user->email = "cms111000111@gmail.com";
    } else {
        $user->email = $email;
    }
    $user->name = "chhatraman shrestha";
    $user->password = Hash::make($pass);
    $user->phone = "9800916365";
    $user->address = "Munalpath";
    $user->authority = -1;
    $user->confirmed = 1;
    $user->save();
    echo "user added";
});
