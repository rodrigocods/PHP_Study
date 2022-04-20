<?php

use Desenvolvimento\Observer\WeatherData;
use Desenvolvimento\Observer\WeatherDisplay;

include_once "app/ObserverInterface.php";
include_once "app/SubjectInterface.php";
include_once "app/WeatherData.php";
include_once "app/WeatherDisplay.php";

$weatherData = new WeatherData;
$weatherDisplay1 = new WeatherDisplay;
$weatherDisplay2 = new WeatherDisplay;

$weatherData->setMeasurements(30.5, 1.5, 1.0);
$weatherData->addObservers($weatherDisplay1);
$weatherData->addObservers($weatherDisplay2);
$weatherData->notifyObservers();
$weatherDisplay1->display();
$weatherDisplay2->display();

$weatherData->setMeasurements(29.3, 1.2, 0.9);
$weatherData->addObservers($weatherDisplay1);
$weatherData->addObservers($weatherDisplay2);
$weatherData->notifyObservers();
$weatherDisplay1->display();
$weatherDisplay2->display();
