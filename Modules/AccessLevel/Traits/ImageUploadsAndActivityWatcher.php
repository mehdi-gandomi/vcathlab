<?php
namespace Modules\AccessLevel\Traits;

use Modules\AccessLevel\Models\Base\UserActivity;
use Modules\AccessLevel\Enums\UserActivityTypes;
use Modules\AjaxUpload\Entities\Traits\HasImageUploads;

trait ImageUploadsAndActivityWatcher {
	use HasImageUploads, UserActivityWatcher {
		HasImageUploads::updateModel as updateModelBase;
	}

	/* Can be:
	static::saved(function ($model) {
		UserActivity::make()->on($model)->as(UserActivityTypes::Upload);
	}); */
	public function updateModel($imagePath, $imageFieldName)
	{
		UserActivity::make()->on($this)->as(UserActivityTypes::Upload);
		return $this->updateModelBase($imagePath, $imageFieldName);
	}
}
