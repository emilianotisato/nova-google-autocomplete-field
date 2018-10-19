<?php

namespace EmilianoTisato\GoogleAutocomplete;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/google-autocomplete'),
            ], 'google-autocomplete-lang');

            $this->publishes([
                __DIR__.'/../config' => config_path(),
            ], 'google-autocomplete-config');
        }

        
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'google-autocomplete');
        $this->loadJsonTranslationsFrom(resource_path('lang/vendor/google-autocomplete'));

        Nova::serving(function (ServingNova $event) {
            Nova::script('google-autocomplete', __DIR__.'/../dist/js/field.js');
            Nova::style('google-autocomplete', __DIR__.'/../dist/css/field.css');
            Nova::provideToScript([
                'google_autocomplete_translations' => $this->getTranslations(),
            ]);
        });

    }

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
     * Get the translation keys from file.
     *
     * @return array
     */
    private static function getTranslations()
    {
        $translationFile = resource_path('lang/vendor/google-autocomplete/'.app()->getLocale().'.json');
        if (! is_readable($translationFile)) {
            return [];
        }
        
        return json_decode(file_get_contents($translationFile), true);
    }
}
