<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Mar 2019 09:05:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Coach
 * 
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $name
 * @property string $gender
 * 
 * @property \Illuminate\Database\Eloquent\Collection $training_sessions
 *
 * @package App\Models
 */
class Coach extends Eloquent
{
	protected $fillable = [
		'name',
		'gender'
	];

	public function training_sessions()
	{
		return $this->hasMany(\App\Models\TrainingSession::class);
	}
}
