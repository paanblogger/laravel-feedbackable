<?php

namespace Paanblogger\Feedbackable\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasFeedback
{
    /**
     * @return MorphMany
     */
    public function feedbacks(): MorphMany
    {
        return $this->morphMany(config('laravel-feedbackable.models.feedback'), 'feedbackable');
    }

    /**
     * @return MorphMany
     */
    public function creator(): MorphMany
    {
        return $this->morphMany(config('laravel-feedbackable.models.feedback'), 'creator');
    }

    /**
     * @return bool
     */
    public function hasFeedback():bool
    {
        return $this->feedbacks()->count();
    }
}
