<?php

namespace Desenvolvimento\Observer;

class WeatherData implements SubjectInterface
{
    private $temperature;
    private $humidity;
    private $pressure;
    private $observers;

    public function setMeasurements(float $temperature, float $humidity, float $pressure)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
    }

    public function addObservers(ObserverInterface $observer)
    {
        $this->observers[] = $observer;
    }

    public function removeObservers(ObserverInterface $observerTarget)
    {
        foreach($this->observers as $i => $observer)
        {
            if($observer == $observerTarget)
            {
                unset($this->observers[$i]);
            }
        }
    }

    public function notifyObservers()
    {
        foreach($this->observers as $observer)
        {
            $observer->update($this->temperature, $this->humidity, $this->pressure);
        }
    }
}