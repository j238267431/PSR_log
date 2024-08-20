<?php
namespace App\Controller;
use App\Controller\EventListener\EventDispatcher;
use App\Controller\EventListener\ListenerProvider;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\EventListener\MessageListener;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\EventListener\Event;
use App\Controller\EventListener\Message;

class UserMessages
{
   #[Route('/api/test/event')]
   public function handleMessage(Request $request) :response
   {

      $listenerProvider = (new ListenerProvider())
           ->addListener(Event::class, new MessageListener());
      $message = new Message($request->query->get('message'));
      $dispatcher = new EventDispatcher($listenerProvider);
      $dispatcher->dispatch(new Event($message));
      
      return new Response(
         '<html><body>Сообщение: '. $request->query->get('message') .' </body></html>'
     );
   }
}