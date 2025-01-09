<?php

  namespace App\Console\Commands;

  use Exception;
  use Illuminate\Console\Command;
  use Illuminate\Support\Arr;
  use Illuminate\Support\Facades\Process;
  use Illuminate\Support\Sleep;
  use Symfony\Component\Yaml\Yaml;

  class share extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'share';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an Ngrok Development Server packed with Vite';

    protected string $ngrok_config_path;
    protected array $ngrok_config;
    protected string $ngrok_site_hostname;
    protected string $ngrok_vite_hostname;
    protected bool $should_stop_watching_hot_file = false;

    /**
     * Execute the console command.
     * @throws Exception
     */
    public function handle(): void {
      $this->ngrok_config_path = base_path('ngrok.yml');
      $this->ngrok_config = Yaml::parseFile($this->ngrok_config_path);
      $this->ngrok_site_hostname = Arr::get($this->ngrok_config, 'tunnels.site.hostname');
      $this->ngrok_vite_hostname = Arr::get($this->ngrok_config, 'tunnels.vite.hostname');

      if (!file_exists($this->ngrok_config_path)) {
        throw new Exception("Config not fount. Looked for: $this->ngrok_config_path");
      }

      $remove_share_file = $this->touch_share_file();
      $stop_ngrok = $this->start_ngrok();
      $restore_hot_file = $this->watch_hot_file();

      $remove_share_file();
      $stop_ngrok();
      $restore_hot_file();
    }

    public function start_ngrok(): callable {
      $this->line("Starting the development server at: https://{$this->ngrok_site_hostname}");
      $this->line("Vite will be served at: https://{$this->ngrok_vite_hostname}");

      $ngrok_process = Process::start("ngrok start --all --config=$this->ngrok_config_path");

      return function () use ($ngrok_process) {
        if ($ngrok_process->running()) {
          $ngrok_process->stop();
        }
      };
    }

    public function watch_hot_file(): callable {
      $hot_file_path = public_path('hot');
      $hot_file_content = '';

      $this->line("Starting to watch the 'hot' file inside public/");
      $this->line("Press CTRL+C to stop the servers.");
      while (true) {
        if ($this->should_stop_watching_hot_file) {
          break;
        }
        if (file_exists($hot_file_path)) {
          $hot_file_content ??= file_get_contents($hot_file_path);
          file_put_contents($hot_file_path, "https://{$this->ngrok_vite_hostname}");
        }
        Sleep::for(3)->seconds();
      }

      return function () use ($hot_file_path, $hot_file_content) {
        if (file_exists($hot_file_path)) {
          file_put_contents($hot_file_path, $hot_file_content);
        }
      };
    }

    public function touch_share_file(): callable {
      file_put_contents(storage_path('sharefile'), $this->ngrok_site_hostname);
      return function () {
        @unlink(storage_path('sharefile'));
      };
    }
  }
