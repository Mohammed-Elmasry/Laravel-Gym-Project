<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Mar 2019 09:05:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Gym
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $create_at
 * @property string $cover_image
 * @property int $revenue
 * @property int $city_id
 * 
 * @property \App\Models\City $city
 * @property \Illuminate\Database\Eloquent\Collection $training_sessions
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Gym extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'revenue' => 'int',
		'city_id' => 'int'
	];

	protected $dates = [
		'create_at'
	];

	protected $fillable = [
		'name',
		'create_at',
		'cover_image',
		'revenue',
		'city_id'
	];

	public function city()
	{
		return $this->belongsTo(\App\Models\City::class);
	}

	public function training_sessions()
	{
		return $this->hasMany(\App\Models\TrainingSession::class);
	}

	public function users()
	{
		return $this->hasMany(\App\Models\User::class);
	}
}
