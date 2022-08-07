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

      if (count(glob( database_path('migrations/' . "*_create_planets_table.php"))) == 0) {
        $this->publishes([
          __DIR__ . '/../database/migrations/create_planets_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_planets_table.php')
        ], 'migrations');
      }

      if (count(glob( database_path('migrations/' . "*_create_people_table.php"))) == 0) {
        $this->publishes([
          __DIR__ . '/../database/migrations/create_people_table.php' => database_path('migrations/' . date('Y_m_d_His', time()+1) . '_create_people_table.php')         
        ], 'migrations');
      }
      
      if (! file_exists(database_path('seeds/PeopleAndPlanetTableSeeder.php'))) {
        $this->publishes([
          __DIR__ . '/../database/seeds/PeopleAndPlanetTableSeeder.php' => database_path('seeds/PeopleAndPlanetTableSeeder.php'),         
        ], 'migrations');
      }
    }
  }
}

?>