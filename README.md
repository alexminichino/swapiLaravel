

# Swapi Laravel

Package per recuperare e clonare in locale alcuni dei dati disponibili su https://swapi.dev.

## Requirements

- Laravel 8.x
- PHP 8.0 or later

## Quickstart

Per prima cosa bisogna aggiungere la seguente dipendenza al file composer.json:

    "repositories": [
        {
          "type": "vcs",
          "url": "https://github.com/alexminichino/swapiLaravel.git"
        }
    ]
facendo attenzione ad inserire il package anche nello scope require:

    "require": {
        ...
        "alexminichino/swapi": "dev-master",
        ...
    },

A questo punto bisogna lanciare il comando:

    composer update

e il comando:

    php artisan swapi:install

A questo punto il setup è terminato e non ci resta che utilizzare le seguenti API dalla nostra App Laravel.

    /people
    /people/{id}
    /planet
    /planet/{id}

