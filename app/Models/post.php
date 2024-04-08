<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;


    /**
     * les attributes 
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'description',
    ];

    /**
     * les attributes qui doit etre caché pour pour arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at', // Exemple d'un attribut à cacher lors de la conversion en tableau
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'published_at' => 'datetime', // Exemple de conversion de type pour un attribut de date/heure
    ];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}



