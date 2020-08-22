<?php

namespace Paanblogger\Feedbackable;

use Illuminate\Support\ServiceProvider;

class FeedbackableServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-feedbackable.php', 'laravel-feedbackable');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // publish config file
            // register artisan command
            if (!class_exists('CreateFeedbackTable')) {
                $this->publishes(
                    [
                        __DIR__ . '/../database/migrations/create_feedback_table.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_feedback_table.php'),
                    ], 'migrations');
            }
            $this->publishes([
                __DIR__ . '/../config/laravel-feedbackable.php' => config_path('laravel-feedbackable.php'),
            ], 'config');
        }
    }
}
