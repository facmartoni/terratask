<?php

  namespace App\Providers;

  use Illuminate\Support\Facades\App;
  use Illuminate\Support\Facades\Config;
  use Illuminate\Support\Facades\URL;
  use Illuminate\Support\ServiceProvider;

  class ShareServiceProvider extends ServiceProvider {
    /**
     * Register services.
     */
    public function register(): void {
      //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {
      if (!App::isLocal() || !file_exists(storage_path('sharefile'))) {
        return;
      }

      $ngrok_site_host = file_get_contents(storage_path('sharefile'));
      $shareable_url = "https://{$ngrok_site_host}";

      Config::set([
        'app.url' => $shareable_url,
        'app.asset_url' => '/'
      ]);

      URL::forceRootUrl($shareable_url);
      URL::forceScheme('https');
    }
  }
