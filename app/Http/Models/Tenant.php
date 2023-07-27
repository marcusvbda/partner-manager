<?php

namespace App\Http\Models;

use marcusvbda\vstack\Models\DefaultModel;
use App\User;

class Tenant extends DefaultModel
{
	protected $table = "tenants";
	// public $cascadeDeletes = [];
	public $restrictDeletes = ["users"];

	public $appends = ["code"];

	public $casts = [
		"data" => "object",
	];

	public static function hasTenant() //default true
	{
		return false;
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}