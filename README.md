## Fetch openweathermap api

Install like you would any laravel app

in your .env add the line:
```
OPENWEATHERMAP_API_KEY=yourapikey
```

To fetch weather info for single city use the following artisan command:
```
php artisan fetch:weather-info-city "name"
```
example:
```
php artisan fetch:weather-info-city Berovo
php artisan fetch:weather-info-city Star+Dojran
```

To fetch for all cities (scheduler does this every hour automatically):
```
php artisan fetch:weather-info-all
```

In the database, I write the names of the cities with 2 part names with a "+" between them, so that they correspond with those of the api and the writing of the command.
