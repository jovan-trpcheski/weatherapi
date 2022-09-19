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
```

To fetch for all cities (scheduler does this every hour automatically):
```
php artisan fetch:weather-info-all
```

