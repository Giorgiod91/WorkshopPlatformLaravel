<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    // Namensgebung nicht eingehalten meine Tabelle ist Plural
    protected $table= 'workshop';

    // damit create funktioniert und erlaubt die felder zu schreiben

 protected $fillable = [
        'title',
        'description',
        'image_path',


    ];
}

