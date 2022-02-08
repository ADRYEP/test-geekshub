<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User_Roles;
use App\Models\Users_RentedMovies;

class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_roles'
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
    protected $table = 'users';

    /**
     * The primary key associated with the table.
     *
     */
    protected $primaryKey = 'id';

    /**
     * Relation with user_roles
     * Many users can have one rol
     */
    public function user_roles(){
        return $this->hasOne(User_Roles::class);
    }

    /**
     * Relation with Users_RentedMovies (Pivotal table)
     * Many users can have many movies
     */
    public function users_rentedMovies(){
        return $this->hasMany(Users_RentedMovies::class);
    }

}
