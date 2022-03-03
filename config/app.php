<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Tadah'),

    /*
    |--------------------------------------------------------------------------
    | Custom Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration options for the website.
    |
    */

    // Site settings
    'server_creation_enabled' => true,
    'item_creation_enabled' => true,
    'asset_upload_cost' => 0,
    'assets_approved_by_default' => true,
    'thumbnail_key' => 'vubPQLBiNPfW38KLWd5d',
    'dedicated_key' => 'wBY1uid5uJY2fXA0Hypr',

    // Forum settings
    'posting_enabled' => true,
    'posting_cooldown' => 15,

    // Main page quotes
    'quotes' => [
        'Come on in tadah.rocks tadah.rocks',
        'SOTP',
        'SYOP',
        'Made you look',
        'The game',
        'Can you stop',
        'looking for a femboy, hit me up',
        'donate pl0x',
        'Roblox.com',
        'Putos pendejos tontaa',
        'Wanna be friends?',
        '“Stop trying to kill the part of u that is cringe. Kill the part of u that cringes.” -Jesus',
        'yall are the appetomy of mental illness',
        'dudes having a whole ass annuerism',
        'its treadmill time [ Content Deleted ]',
        'Anonfiles.com/',
        'Ignorance is bliss, when tis folly to be wise.',
        'Null may have deleted general but at least he\'s not a pedo.',
        'today i put a chicken tikka slice in the oven when i came back from school BUT I ACCIDENTALLY SET THE OVEN TO GRILL AND NOW THE FUCKING THING LOOKS LIKE THIS',
        'ay bro just warning you, you probably shouldn\'t involve yourself with taskmanager\'s mercury shit he\'s a malicious individual who was behind the leaking of my IP address, and also blatantly stole the name from brent\'s mercury thing',
        'Nancy Pelosi farting while twerking....Blowing straight dust...',
        'Hello lets talk',
        'Yeah',
        'i dont think it is but that doesnt mean i am into it',
        'This day just keeps getting better n better! Free food!',
        'https://twitter.com/i/status/550345227790061570',
        'need to fart on someone\'s face who wants a pink eye from me',
        'https://twitter.com/i/status/386917584580665344',
        'Always love looking back on these dms just to see how carrot turned you into a complete degenerate. Turned from you trying you get client patching help from me to some dumbass bottling thing, then finally they switched to full [ Content Deleted ] mode',
        'https://twitter.com/i/status/1437064280382205958',
        'ur such a noob i mean how could you delete the whole winners??? that just wasted my time of even TRYING to get to winners ur just the noobiest thing ive like EVER seen im gonna keep sending you hate messages until ur sorry for deleting the winners. you hear me? GOOD well you better regret doing that cus im gonna spam yo inbox teehehhehehehheeh!!!! when i make a group ill put u in the biggest noob ever rank XD XD XD PWNAGE!!!!!! lolololol ima spam you ur a nooby fail.you are stupid. and you are stupid. and dont forget that you are stupid. your mom is a fail even more of a fail then you. yo mamma so fat when she went outside in a red dress kids yelled HEY KOOLAID!',
        'got you',
        'get on fortnite',
        'Like and RT for your chance to win 100,000 wasps delivered right to your home!!!',
        'Wanna rp',
        'this image reminds me of the song Archimedes from TF2',
        'https://www.youtube.com/watch?v=CMJizXYSiKk',
        'can you stop writing in shift lock for once',
        'wouldn\'t want to join shitvival #484637595737595 to begin with lmfao',
        '"remember when ray leaked like 3 ips on the rblxdev forums" -XlXi, owner of Graphictoria',
        'footlong meatball on italian herb and cheese with provolone, toasted'
    ],

    // Registration settings
    'invite_keys_required' => true,
    'registration_enabled' => true,

    // Currency settings
    'currency_name' => 'Dahllor',
    'currency_name_multiple' => 'Dahllors',
    'daily_reward' => 25,

    // Launcher/client settings
    'version_string' => '1.0.FUCKCORPORATIONS',

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL', null),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'EST',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Arr' => Illuminate\Support\Arr::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'Date' => Illuminate\Support\Facades\Date::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Http' => Illuminate\Support\Facades\Http::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        // 'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'Str' => Illuminate\Support\Str::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,

    ],

];
