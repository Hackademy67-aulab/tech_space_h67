<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'city',
        'description',
        'image',
        'user_id'
    ];

    //:BelongsTo dice che questa funzione resituirá un oggetto istanza della classe BelongsTo
    //Il nome della funzione deve essere al singolare del nome del modello coinvolto nella relazione
    public function user(): BelongsTo
    {
        //l'oggetto shop appena creato sará strettamente collegato ad una istanza(oggetto) della classe User
        return $this->belongsTo(User::class);
    }
}
