<?php

namespace App\Controller\EventListener;

use Psr\EventDispatcher\StoppableEventInterface;

class Event implements StoppableEventInterface
{
   private bool $propagationStopped = false;
   private object $object;

   public function __construct(object $object)
   {
       $this->object = $object;
   }

   public function getObject(): object
   {
       return $this->object;
   }

   public function isPropagationStopped(): bool
    {
        return $this->propagationStopped;
    }

}