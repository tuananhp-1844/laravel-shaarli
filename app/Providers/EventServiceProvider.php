<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \App\Events\LinkArchiveRequested::class => [
            \App\Listeners\MakeLinkArchive::class
        ]
    ];

    public function boot()
    {
        parent::boot();

        \App\Tag::observe(\App\Observers\TagObserver::class);
    }
}
