<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class User_Roles extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The table associated with the model
     * 
     */
    protected $table = 'user_roles';

    /**
     * The primary key associated with the table.
     *
     */
    protected $primaryKey = 'id';
    
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
