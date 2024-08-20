<?php
namespace App\Controller\Logger;

use Psr\Log\LoggerTrait;
use App\Controller\Logger\File;

class Logger implements \Psr\Log\LoggerInterface
{
   use LoggerTrait;
   
   public function log($level, string|\Stringable $message, array $data = []): void
   { 
      $handler = new File;
      $handler->handle($level, $message);
   }

}