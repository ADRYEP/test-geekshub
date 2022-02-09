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
     * Prevent Model to wait for a timestamp value
     */
    public $timestamps = false;

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

    /**
     * Methods
     */

    public static function createUser($request){
        $data = $request->all();
        $user = new User;

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->id_roles = $data['id_roles'];

        $user->save();

        return response()->json([
            "message" => "User created"
        ], 201);
    }

    public static function getUsers(){
        $users = User::get()->toJson(JSON_PRETTY_PRINT);
        return response($users,200);
    }

    public static function getUser($id){
        if (User::where('id', $id)->exists()) {
            $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }

    }

    public static function updateUser($id, $request){
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->password = is_null($request->password) ? $user->password : $request->password;
            $user->id_roles = is_null($request->id_roles) ? $user->id_roles : $request->id_roles;
            $user->save();

            return response()->json([
                "message" => "User were updated"
            ], 200);
            
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
        
    }

    public static function destroyUser($id){
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                "message" => "User were deleted"
            ], 200);

        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }

    public static function getMoviesByUser($id){

    }

}
