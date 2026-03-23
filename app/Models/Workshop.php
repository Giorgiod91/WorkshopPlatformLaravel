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
  public function users()
    {
        // Laravel would default the pivot table name to "task_user", but the migration created "user_task".
        return $this->belongsToMany(User::class, 'user_workshop');
  }

}

