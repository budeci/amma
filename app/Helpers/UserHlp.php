<?php
namespace App\Helpers;
use Sentinel;

class UserHlp
{

   public static function getCurUser()
   {
       return Sentinel::check();
   }

    public static function getCurUserId()
    {
        if ($user = self::getCurUser()) return $user->id;
        return null;
    }
}