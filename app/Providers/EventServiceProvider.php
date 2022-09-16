<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\BackupCompleted;
use App\Events\BackupErrored;
use App\Events\UserLoggedInEvent;
use App\Events\UserRegisteredEvent;
use App\Events\AccountConnectedEvent;
use App\Events\UserTrialAboutToExpireEvent;
use App\Events\UserTrialStartedEvent;
use App\Events\UserTrialEndedEvent;
use App\Listeners\NotifyChannelsOfSuccessfulBackup;
use App\Listeners\NotifyChannelsOfErroredBackup;
use App\Listeners\EraseBackupFromDiskListener;
use App\Listeners\SaveLoginInAuditLogListener;
use App\Listeners\SaveUserRegistrationInAuditLogListener;
use App\Listeners\SaveAccountConnectionInAuditLogListeners;
use App\Listeners\SendUserTrialAboutToExpireEmail;
use App\Listeners\SendUserTrialStartedEmail;
use App\Listeners\PauseUserAutomaticBackups;
use App\Listeners\SendUserTrialEndedEmail;
use Laravel\Paddle\Events\SubscriptionCancelled;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BackupErrored::class => [
            NotifyChannelsOfErroredBackup::class,
            EraseBackupFromDiskListener::class,
        ],

        BackupCompleted::class => [
            NotifyChannelsOfSuccessfulBackup::class,
        ],

        UserLoggedInEvent::class => [
            SaveLoginInAuditLogListener::class,
        ],

        UserRegisteredEvent::class => [
            SaveUserRegistrationInAuditLogListener::class,
        ],

        LoginAttemptFailedEvent::class => [
            SaveFailedLoginAtttemptInAuditLogListener::class,
        ],

        AccountConnectedEvent::class => [
            SaveAccountConnectionInAuditLogListeners::class,
        ],

        UserTrialAboutToExpireEvent::class => [
            SendUserTrialAboutToExpireEmail::class,
        ],

        UserTrialStartedEvent::class => [
            SendUserTrialStartedEmail::class,
        ],

        UserTrialEndedEvent::class => [
            PauseUserAutomaticBackups::class,
            SendUserTrialEndedEmail::class,
        ],

        SubscriptionCancelled::class => [
            PauseUserAutomaticBackups::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
