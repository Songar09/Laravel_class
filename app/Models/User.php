<?php

namespace App\Models;


use App\Models\Lend;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

	protected $table = 'users';

    protected $fillable = [
		'number_id',
        'name',
		'last_name',
        'email',
        'password',
    ];

	protected $appends = ['full_name'];

    protected $hidden = [
        'password',
    ];


    protected $casts = [
        'created_at' => 'datetime:Y-m-d', //2022-05-06
		'updated_at' => 'datetime:Y-m-d',
    ];

		//Accesor(get)
		public function getFullNameAttribute()
		{
			return "{$this->name} {$this->Last_name}";
		}

		//Mutator (create - Update)
	public function setPasswordAttribute($value)
	{
		 $this->attributes['password'] = bcrypt($value);
	}

		//Relations...................................

		//prestamos que adquirio el cliente
	public function CustomerLends()
	{
		return $this->hasMany(Lend::class, 'customer_user_id', 'id');
	}
		//prestamos que hizo el bibliotecario
	public function OwnerLends()
	{
		return $this->hasMany(Lend::class, 'owner_user_id', 'id');
	}
}
