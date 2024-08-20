<?php
namespace App\Controller\EventListener;

class Message
{
   protected string $message;


   public function __construct(string|null $message)
   {
      is_null($message) ? $this->message = 'Сообщение не передано' : $this->message = $message;
   }

   public function getMessage() :string
   {
      return $this->message;
   }
}