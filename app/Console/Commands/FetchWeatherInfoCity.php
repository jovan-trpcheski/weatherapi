<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\WeatherInformation;
use Illuminate\Console\Command;
use Throwable;

class FetchWeatherInfoCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:weather-info-city {city_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch weather information for single city';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $response = json_decode(file_get_contents('https://api.openweathermap.org/data/2.5/weather?q=' . $this->argument('city_name') . '&appid=' . config('services.openweathermap.key') . '&units=metric'));

            $city = City::firstOrCreate([
                'name' => $this->argument('city_name')
            ]);

            WeatherInformation::updateOrCreate([
                'city_id' => $city->id,
            ], [
                'temperature' => $response->main->temp,
                'humidity' => $response->main->humidity,
                'description' => $response->weather[0]->description,
            ]);
            $this->info('Weather information for '.$city->name.' was successfully fetched!');
        } catch (Throwable $e) {
            report($e);

            $this->error('Something went wrong! Please check if the city name is correct.');
        }
        return 0;
    }
}
