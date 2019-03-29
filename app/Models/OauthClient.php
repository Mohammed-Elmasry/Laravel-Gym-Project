<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Mar 2019 09:05:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OauthClient
 * 
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $secret
 * @property string $redirect
 * @property bool $personal_access_client
 * @property bool $password_client
 * @property bool $revoked
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class OauthClient extends Eloquent
{
	protected $casts = [
		'user_id' => 'int',
		'personal_access_client' => 'bool',
		'password_client' => 'bool',
		'revoked' => 'bool'
	];

	protected $hidden = [
		'secret'
	];

	protected $fillable = [
		'user_id',
		'name',
		'secret',
		'redirect',
		'personal_access_client',
		'password_client',
		'revoked'
	];
}
