<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'desc',
        'price',
        'rented'
    ];
    /**
     * The table associated with the model
     * 
     */
    protected $table = 'movies';

    /**
     * The primary key associated with the table.
     *
     */
    protected $primaryKey = 'id';

}
