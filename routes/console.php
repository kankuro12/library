<?php

use Illuminate\Foundation\Inspiring;

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
    }
});
