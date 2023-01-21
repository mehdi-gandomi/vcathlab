<?php
namespace Modules\AccessLevel\Traits;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;
use Modules\AccessLevel\Models\Base\UserActivity;
use Modules\AccessLevel\Enums\UserActivityTypes;

trait UserActivityWatcher {
	use LogsActivity;
	protected static $logFillable = true;

	/* public function getDescriptionForEvent($eventName) { // customize "description" field value
		$title = isset(static::$title) ? $this->{static::$title} : '';
		return UserActivity::getDescriptionForEventBase($eventName, $title, $this->table);
	} */

	public function tapActivity(Activity $activity, string $eventName)
	{
		if($eventName == UserActivityTypes::Update) {
			$properties = json_decode($activity->properties, true);
			if(isset($properties['attributes']))
				foreach ($properties['attributes'] as $prop => $value)
					if($properties['old'][$prop] == $value || ($value === null && $properties['old'][$prop] === null)) {
						unset($properties['old'][$prop]);
						unset($properties['attributes'][$prop]);
					}
			$activity->properties = json_encode($properties);
		}
		$activity->system_ip = UserActivity::findRealIP();
	}
}
