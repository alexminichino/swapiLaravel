<?php

namespace AlexMinichino\Swapi\Console;

use Illuminate\Console\Command;
use Artisan;

class InstallPackage extends Command {

     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swapi:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Swapi package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle() {
        $this->info('Installing Swapi package...');

        $this->call('vendor:publish', [
            '--provider' => "AlexMinichino\Swapi\Config\SwapiServiceProvider",
            '--tag' => "migrations"
        ]);

        $this->info('Migrating...');

        Artisan::call('migrate:fresh');

        $this->info('Seeding...');

        exec('composer dump-autoload');

        Artisan::call('db:seed --class=PeopleAndPlanetTableSeeder');

        $this->info('Installed Swapi Package');

    }
}

?>