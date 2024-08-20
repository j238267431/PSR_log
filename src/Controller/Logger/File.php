<?php
namespace App\Controller\Logger;

class File implements \Psr\Log\LoggerAwareInterface
{
   use \Psr\Log\LoggerAwareTrait;
   const LOG_FILE_PATH = 'var/log.log';



   public function handle($level, $message) : void
   {
      $logRow = "[".$level."]"." ".$message . \PHP_EOL;
      @file_put_contents(static::LOG_FILE_PATH, $logRow, FILE_APPEND | LOCK_EX);
   }

}