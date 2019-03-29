<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Mar 2019 09:05:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Attendance
 * 
 * @property int $id
 * @property string $username
 * @property string $training_session_name
 * @property \Carbon\Carbon $attendance_time
 * @property \Carbon\Carbon $attendance_date
 *
 * @package App\Models
 */
class Attendance extends Eloquent
{
	protected $table = 'attendance';
	public $timestamps = false;

	protected $dates = [
		'attendance_time',
		'attendance_date'
	];

	protected $fillable = [
		'username',
		'training_session_name',
		'attendance_time',
		'attendance_date'
	];
}
