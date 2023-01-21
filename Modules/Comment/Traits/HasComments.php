<?php

namespace Modules\Comment\Traits;


use Illuminate\Database\Eloquent\Model;
use Modules\Comment\Contracts\Commentator;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasComments
{
    /**
     * Return all comments for this model.
     *
     * @return MorphMany
     */
    public function comments()
    {
        return $this->morphMany(config('comments.comment_class'), 'commentable');
    }

    /**
     * Attach a comment to this model.
     *
     * @param string $comment
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function comment(string $comment,$name="",$email="")
    {
        return $this->commentAsUser(auth()->user(), $comment,$name,$email);
    }

    /**
     * Attach a comment to this model as a specific user.
     *
     * @param Model|null $user
     * @param string $comment
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function commentAsUser(?Model $user, string $comment,$name="",$email="")
    {
        $commentClass = config('comments.comment_class');

        $comment = new $commentClass([
            'comment' => $comment,
            'name'=>$name,
            'email'=>$email,
            'is_approved' => ($user instanceof Commentator) ? ! $user->needsCommentApproval($this) : false,
            'user_id' => is_null($user) ? null : $user->getKey(),
            'commentable_id' => $this->getKey(),
            'commentable_type' => get_class(),
        ]);

        return $this->comments()->save($comment);
    }

}
