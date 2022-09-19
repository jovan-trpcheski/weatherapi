<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\WeatherInformation;
use Illuminate\Console\Command;
use Throwable;

class FetchWeatherInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:weather-info-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Weather Information for every city in the DB';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cities = City::all();
        foreach ($cities as $city) {
            try {
                $response = json_decode(file_get_contents('https://api.openweathermap.org/data/2.5/weather?q=' . $city->name . '&appid='.config('services.openweathermap.key').'&units=metric'));
                WeatherInformation::updateOrCreate([
                    'city_id' => $city->id,
                ],[
                    'temperature' => $response->main->temp,
                    'humidity' => $response->main->humidity,
                    'description' => $response->weather[0]->description,
                ]);
            } catch (Throwable $e) {
                report($e);
            }
        }
        return 0;
    }
}
