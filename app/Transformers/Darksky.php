<?php

namespace App\Transformers;


class Darksky implements DarkskyInterface
{
    /**
     * Get All attributes given from the API
     *
     * @param $response
     * @return array
     */
    public function allAttributes($response)
    {
        return [
            'latitude' => $response->latitude,
            'longitude' => $response->longitude,
            'timezone' => $response->timezone,
            'time' => $response->daily->data[0]->time,
            'summary' => $response->daily->data[0]->summary,
            'icon' => $response->daily->data[0]->icon,
            'sunriseTime' => $response->daily->data[0]->sunriseTime,
            'sunsetTime' => $response->daily->data[0]->sunsetTime,
            'moonPhase' => $response->daily->data[0]->moonPhase,
            'precipIntensityMax' => $response->daily->data[0]->precipIntensityMax,
            'precipIntensityMaxTime' => $response->daily->data[0]->precipIntensityMaxTime,
            'precipProbability' => $response->daily->data[0]->precipProbability,
            'precipType' => $response->daily->data[0]->precipType,
            'temperatureHigh' => $response->daily->data[0]->temperatureHigh,
            'temperatureHighTime' => $response->daily->data[0]->temperatureHighTime,
            'temperatureLow' => $response->daily->data[0]->temperatureLow,
            'temperatureLowTime' => $response->daily->data[0]->temperatureLowTime,
            'apparentTemperatureHigh' => $response->daily->data[0]->apparentTemperatureHigh,
            'apparentTemperatureHighTime' => $response->daily->data[0]->apparentTemperatureHighTime,
            'apparentTemperatureLow' => $response->daily->data[0]->apparentTemperatureLow,
            'apparentTemperatureLowTime' => $response->daily->data[0]->apparentTemperatureLowTime,
            'dewPoint' => $response->daily->data[0]->dewPoint,
            'humidity' => $response->daily->data[0]->humidity,
            'pressure' => $response->daily->data[0]->pressure,
            'windSpeed' => $response->daily->data[0]->windSpeed,
            'windGust' => $response->daily->data[0]->windGust,
            'windGustTime' => $response->daily->data[0]->windGustTime,
            'windBearing' => $response->daily->data[0]->windBearing,
            'cloudCover' => $response->daily->data[0]->cloudCover,
            'uvIndex' => $response->daily->data[0]->uvIndex,
            'uvIndexTime' => $response->daily->data[0]->uvIndexTime,
            'ozone' => $response->daily->data[0]->ozone,
            'temperatureMin' => $response->daily->data[0]->temperatureMin,
            'temperatureMinTime' => $response->daily->data[0]->temperatureMinTime,
            'temperatureMaxTime' => $response->daily->data[0]->temperatureMaxTime,
            'apparentTemperatureMin' => $response->daily->data[0]->apparentTemperatureMin,
            'apparentTemperatureMinTime' => $response->daily->data[0]->apparentTemperatureMinTime,
            'apparentTemperatureMax' => $response->daily->data[0]->apparentTemperatureMax,
            'apparentTemperatureMaxTime' => $response->daily->data[0]->apparentTemperatureMaxTime,
        ];
    }

    /**
     * Get only selected attributes from API
     *
     * @param $response
     * @return array
     */
    public function onlyImportant($response)
    {
        return [
            'latitude' => $response->latitude,
            'longitude' => $response->longitude,
            'timezone' => $response->timezone,
            'time' => $response->daily->data[0]->time,
            'summary' => $response->daily->data[0]->summary,
            'icon' => $response->daily->data[0]->icon,
            'sunriseTime' => $response->daily->data[0]->sunriseTime,
            'sunsetTime' => $response->daily->data[0]->sunsetTime,
            'temperatureHigh' => $response->daily->data[0]->temperatureHigh,
            'temperatureHighTime' => $response->daily->data[0]->temperatureHighTime,
            'temperatureLow' => $response->daily->data[0]->temperatureLow,
            'temperatureLowTime' => $response->daily->data[0]->temperatureLowTime,
            'dewPoint' => $response->daily->data[0]->dewPoint,
            'humidity' => $response->daily->data[0]->humidity,
            'pressure' => $response->daily->data[0]->pressure,
            'windSpeed' => $response->daily->data[0]->windSpeed,
            'cloudCover' => $response->daily->data[0]->cloudCover,
        ];

    }
}