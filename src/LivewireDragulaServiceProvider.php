<?php

namespace YourNamespace\LivewireDragula;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use YourNamespace\LivewireDragula\Http\Livewire\DragulaWidget;

class LivewireDragulaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'livewire-dragula');
        
        // Register config
        $this->publishes([
            __DIR__ . '/config/livewire-dragula.php' => config_path('livewire-dragula.php'),
        ], 'livewire-dragula-config');
        
        // Register Livewire component
        Livewire::component('dragula-widget', DragulaWidget::class);
    }

    public function register()
    {
        // Merge config
        $this->mergeConfigFrom(
            __DIR__ . '/config/livewire-dragula.php', 'livewire-dragula'
        );
    }
}
