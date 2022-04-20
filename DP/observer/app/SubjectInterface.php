<?php

namespace Desenvolvimento\Observer;

interface SubjectInterface
{
    public function addObservers(ObserverInterface $observer);

    public function removeObservers(ObserverInterface $observer);

    public function notifyObservers();
}