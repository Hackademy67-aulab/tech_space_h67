<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    //nome della funzione deve essere il plurale del modello singolare coinvolto
    public function products(): BelongsToMany
    {
        //l'oggetto,istanza della classe shop, sará strettamente collegato a piú oggetti istanze della classe Product
        //la funzione belongsToMany restituisce sempre una collection sia che abbia un solo elemento, sia che ne abbia piú di uno o nessuno
        return $this->belongsToMany(Product::class);
    }
}
