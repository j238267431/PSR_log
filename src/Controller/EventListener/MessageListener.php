<?php

namespace App\Controller\EventListener;

use App\Controller\EventListener\Event;
use App\Controller\Logger\Logger;
use App\Controller\EventListener\Message;

class MessageListener
{
   public function __invoke(Event $event)
   {
      $object = $event->getObject();
      if ($object instanceof Message) {
         $logger = new Logger();
         $logger->info($object->getMessage());
     }

   }
}