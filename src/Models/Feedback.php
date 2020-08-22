<?php

namespace Paanblogger\Feedbackable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Feedback extends Model
{
    // Disable Laravel's mass assignment protection
    protected $guarded = [];
    public function feedbackable() : MorphTo
    {
        return $this->morphTo();
    }

    public function creator() : MorphTo
    {
        return $this->morphTo();
    }
}
