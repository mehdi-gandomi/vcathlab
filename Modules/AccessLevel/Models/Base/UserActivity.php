<?php

namespace Modules\AccessLevel\Models\Base;

use App\Models\User;
use Modules\AccessLevel\Models\Base\User as BaseUser;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Modules\AccessLevel\Core\ActivityLogger;
use Modules\AccessLevel\Enums\UserActivityTypes;
use Modules\Helpers\Perform;

class UserActivity extends Activity {
	use SoftDeletes;
	public $table = 'activity_log';
	public function __construct(array $attributes = []) {
		$this->mergeFillable(['system_ip']);
		parent::__construct($attributes);
	}

	/**
	 * attributesToArray
	 * @Overrided for add causer|string and subject|string and json_decode properties to out array
	 *
	 * @return array
	 */
	public function attributesToArray()
	{
		/**
		 * @var array
		 */
		$data = parent::attributesToArray();
		$data['properties'] = json_decode($data['properties']);

		/**
		 * @var Model
		 * morphed from subject_type & subject_id field
		 */
		$subject = $this->subject;
		/**
		 * @var Model
		 * morphed from subject_type & subject_id field
		 */
		$causer = $this->causer;

		$data['real_causer'] = $causer ? ($causer->name . " ({$causer->id})") : '';
		$data['real_subject'] = $subject ? (__(app($this->subject_type)->table) . ' ' . $subject->{$this->subject_type::$title} . " ({$subject->id})") : '';

		return $data;
	}

	/**
	 * boot
	 * @Overrided for register soft delete events
	 *
	 * @return void
	 */
	protected static function boot() {
		parent::boot();

		static::deleting(function($activity) {
			if(!$activity->isForceDeleting())
				Perform::silent($activity, function($activity) {
					$activity->state = 0;
					$activity->save();
				});
		});
		static::restoring(function($activity) {
			Perform::silent($activity, function($activity) {
				$activity->state = 1;
				$activity->save();
			});
		});
	}

	/**
	 * getDescriptionForEventBase
	 *
	 * @param  string $eventName
	 * @param  string $title
	 * @param  string $table
	 * @return string
	 */
	public static function getDescriptionForEventBase($eventName, $title, $table)
	{
		return trim(__($eventName) . ' ' . __($table) . ' ' . $title);
	}

	/**
	 * findRealIP
	 *
	 * @return string
	 */
	public static function findRealIP() {
		$ipAddress ='';
		$variableIndex = array("HTTP_CLIENT_IP","HTTP_X_FORWARDED_FOR","HTTP_X_FORWARDED","HTTP_FORWARDED_FOR","HTTP_FORWARDED","REMOTE_ADDR");
		foreach ($variableIndex as $key)
			if(array_key_exists($key, $_SERVER)) {
				$ipAddress = $_SERVER[$key];
				break;
			}
		return $ipAddress;
	}

	/**
	 * make
	 * makeActivity
	 *
	 * @param  string|null $activity
	 * @param  User|null $user
	 * @return UserActivity|ActivityLogger
	 */
	public static function make($activity=null, $user=null) // makeActivity
	{
		$user = BaseUser::normalize($user);
		$instance = ActivityLogger::make()->causedBy($user);

		if(!$activity)
			return $instance;

		return $instance->log($activity);
	}

	public static function login($user=null) {
		return static::make(UserActivityTypes::Login, $user);
	}

	public static function logout($user=null) {
		return static::make(UserActivityTypes::Logout, $user);
	}

	public static function restricted($user=null) {
		return static::make(UserActivityTypes::Restricted, $user);
	}

	public static function view($model, $user=null) {
		$user = BaseUser::normalize($user);
		return static::make()->on($model)->causedBy($user)->log(UserActivityTypes::View);
	}

	public static function wrongPassword($userOrEmail) {
		$activity = static::make()->causedByAnonymous();

		$user = (gettype($userOrEmail) != "string") ? BaseUser::normalize($userOrEmail) : User::where("email", $userOrEmail)->first();
		if($user)
			$activity->on($user);
		else
			$activity->withProperty('email', $userOrEmail);
		return $activity->log(UserActivityTypes::WrongPassword);
	}
}
