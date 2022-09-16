<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Component;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        Component::macro('notifySuccess', function ($message) {
            $this->dispatchBrowserEvent('notify', [
                'message' => $message,
                'type' => 'success'
            ]);
        });

        Component::macro('notifyDanger', function ($message) {
            $this->dispatchBrowserEvent('notify', [
                'message' => $message,
                'type' => 'danger'
            ]);
        });

        Component::macro('notifyWarning', function ($message) {
            $this->dispatchBrowserEvent('notify', [
                'message' => $message,
                'type' => 'warning'
            ]);
        });

        Component::macro('notifyInfo', function ($message) {
            $this->dispatchBrowserEvent('notify', [
                'message' => $message,
                'type' => 'info'
            ]);
        });

        Component::macro('flashSuccess', function ($message) {
            session()->flash('notify', [
                'type' => 'success',
                'message' => $message
            ]);
        });

        Component::macro('flashDanger', function ($message) {
            session()->flash('notify', [
                'type' => 'danger',
                'message' => $message
            ]);
        });

        Component::macro('flashWarning', function ($message) {
            session()->flash('notify', [
                'type' => 'warning',
                'message' => $message
            ]);
        });

        Component::macro('flashInfo', function ($message) {
            session()->flash('notify', [
                'type' => 'info',
                'message' => $message
            ]);
        });
    }
}