<?php

namespace App\Helpers;

class CurrencyHelper
{
     public static function idr($amount)
     {
          return 'Rp ' . number_format($amount, 0, ',', '.');
     }
}
