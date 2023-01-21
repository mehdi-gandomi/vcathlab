<?php

namespace Modules\AccessLevel\Traits;

use Spatie\Translatable\HasTranslations as HasTranslationsBase;

trait HasTranslations
{
	use HasTranslationsBase;

	public function attributesToArray()
	{
		$data = parent::attributesToArray();
		foreach ($this->translatable as $field)
			$data[$field] = $this->$field;
		return $data;
	}
}
