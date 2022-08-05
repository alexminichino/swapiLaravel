<?php

namespace AlexMinichino\Swapi\Config;

use Illuminate\Support\ServiceProvider;

use AlexMinichino\Swapi\Console\InstallPackage;

class SwapiServiceProvider extends ServiceProvider {
  public function boot() {

    $this->loadRoutesFrom(__DIR__.'../../routes/api.php');
    
    if ($this->app->runningInConsole()) {
      
      $this->commands([
          InstallPackage::class,
      ]);

      if (! class_exists('CreatePeopleTable')) {
        $this->publishes([
          __DIR__ . '/../database/migrations/create_planets_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_planets_table.php'),
          __DIR__ . '/../database/migrations/create_people_table.php' => database_path('migrations/' . date('Y_m_d_His', time()+1) . '_create_people_table.php'),
         // __DIR__ . '/../database/migrations/create_people_planet_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_people_planet_table.php'),
         
        ], 'migrations');
      }

      if (! class_exists('PeopleAndPlanetTableSeeder')) {
        $this->publishes([
          __DIR__ . '/../database/seeds/PeopleAndPlanetTableSeeder.php' => database_path('seeds/PeopleAndPlanetTableSeeder.php'),         
        ], 'migrations');
      }
    }
  }
}

?>