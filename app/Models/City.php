<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Mar 2019 09:05:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class City
 * 
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $name
 * @property int $revenue
 * 
 * @property \Illuminate\Database\Eloquent\Collection $gyms
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class City extends Eloquent
{
	protected $casts = [
		'revenue' => 'int'
	];

	protected $fillable = [
		'name',
		'revenue'
	];

	public function gyms()
	{
		return $this->hasMany(\App\Models\Gym::class);
	}

	public function users()
	{
		return $this->hasMany(\App\Models\User::class);
	}
}
