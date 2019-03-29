<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Mar 2019 09:05:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OauthRefreshToken
 * 
 * @property string $id
 * @property string $access_token_id
 * @property bool $revoked
 * @property \Carbon\Carbon $expires_at
 *
 * @package App\Models
 */
class OauthRefreshToken extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'revoked' => 'bool'
	];

	protected $dates = [
		'expires_at'
	];

	protected $fillable = [
		'access_token_id',
		'revoked',
		'expires_at'
	];
}
