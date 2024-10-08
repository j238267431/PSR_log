<?php
namespace App\Controller\EventListener;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use Psr\EventDispatcher\StoppableEventInterface;

class EventDispatcher implements EventDispatcherInterface
{
   private $listenerProvider;

   public function __construct(ListenerProviderInterface $listenerProvider)
   {
       $this->listenerProvider = $listenerProvider;
   }

   public function dispatch(object $event): void
   {

       if ($event instanceof StoppableEventInterface && $event->isPropagationStopped()) {
           return;
       }
       foreach ($this->listenerProvider->getListenersForEvent($event) as $listener) {
           $listener($event);
       }
       return;
   }

}