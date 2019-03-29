<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Mar 2019 09:05:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Package
 * 
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $name
 * @property int $price
 * @property int $sessions_no
 *
 * @package App\Models
 */
class Package extends Eloquent
{
	protected $casts = [
		'price' => 'int',
		'sessions_no' => 'int'
	];

	protected $fillable = [
		'name',
		'price',
		'sessions_no'
	];
}
