<?php

namespace Modules\Comment\Traits;


trait CanComment
{
    /**
     * Check if a comment for a specific model needs to be approved.
     * @param mixed $model
     * @return bool
     */
    public function needsCommentApproval($model): bool
    {
        return true;
    }
}
