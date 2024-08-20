<?php
namespace App\Controller\EventListener;

use Psr\EventDispatcher\ListenerProviderInterface;

class ListenerProvider implements ListenerProviderInterface
{
   private $listeners = [];

   public function getListenersForEvent(object $event): iterable
   {
      $eventType = get_class($event);
      if(array_key_exists($eventType, $this->listeners)){
         return $this->listeners[$eventType];
      }
      return [];
   }

   public function addListener(string $eventType, callable $callable): self
   {
       $this->listeners[$eventType][] = $callable;
       return $this;
   }
}