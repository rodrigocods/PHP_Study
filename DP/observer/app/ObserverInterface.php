<?php

namespace Desenvolvimento\Observer;

interface ObserverInterface
{
    public function update(float $temperature, float $humidity, float $pressure);
}