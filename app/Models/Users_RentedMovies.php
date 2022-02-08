<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Movies;

class Users_RentedMovies extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'id_user',
        'id_movie'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The table associated with the model
     * 
     */
    protected $table = 'users_rentedMovies';

    /**
     * The primary key associated with the table.
     *
     */
    protected $primaryKey = 'id';

    /**
     * Relation with User
     * Many users can have many movies
     */
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Relation with Movies
     * Many users can have many movies
     */
    public function Movies()
    {
        return $this->belongsTo(Movies::class, 'id_movie');
    }   
}
