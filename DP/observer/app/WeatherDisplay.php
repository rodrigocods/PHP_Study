<?php

namespace Desenvolvimento\Observer;

class WeatherDisplay implements ObserverInterface
{
    private $temperature;
    private $humidity;
    private $pressure;

    public function update(float $temperature, float $humidity, float $pressure)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
    }

    public function display()
    {
        echo "Temperature: {$this->temperature}°C\n
        Humidity: {$this->humidity}\n
        Pressure: {$this->pressure}";
    }
}