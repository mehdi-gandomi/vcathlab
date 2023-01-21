<?php

namespace Modules\AccessLevel\Core;

use Modules\AccessLevel\Models\Base\UserActivity;
use Spatie\Activitylog\ActivityLogStatus;
use Spatie\Activitylog\ActivityLogger as ActivityLoggerBase;
use Spatie\Activitylog\Contracts\Activity as ActivityContract;

class ActivityLogger extends ActivityLoggerBase {
	protected $instance = null;

	public static function make() : ActivityLogger
	{
		$defaultLogName = config('activitylog.default_log_name');

		return app(static::class)
			->useLog($logName ?? $defaultLogName)
			->setLogStatus(app(ActivityLogStatus::class))
			->onIP();
	}

	public function as(string $description) {
		return $this->log($description);
	}

	public function withProperty($key, $value)
	{
		$properties = $this->getActivity()->properties;

		if(gettype($properties) == "string")
			$properties = collect(json_decode($properties, true));

		$this->getActivity()->properties = $properties->put($key, $value);

		return $this;
	}

	/* public function getRealActivity() : ActivityContract
	{
		return $this->getActivity();
	} */

	public function onIP($ip = 0)
	{
		if ($ip === 0)
			$ip = UserActivity::findRealIP();

		$this->getActivity()->system_ip = $ip;

		return $this;
	}
}