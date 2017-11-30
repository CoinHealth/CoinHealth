<?php
use Illuminate\Support\Str;
use App\Quote;

if (!function_exists('get_channel_route')) {
  function get_channel_route($channel)
  {
    $route = 'general';
    switch ($channel) {
        case 2:
            $route = 'health-wellness';
        break;
        case 3:
            $route = 'news';
        break;
        case 4:
            $route = 'support';
        break;
    }
    return $route;
  }
}

if (!function_exists('monetary')) {
  function monetary($value)
  {
    return intval(preg_replace('/[^\d.]/', '', $value));
  }
}

if (!function_exists('see_more')) {
  function see_more($string, $hashed_id, $baseurl = 'news', $limit = 200)
  {
    if (strlen($string) <= $limit) return $string;

    $limited =  str_limit($string, $limit, '<span class="see-more-container">... <a href="/community/'.$baseurl.'/'.$hashed_id.'" class="see-more">see more</a></span>');
    return $limited;
  }
}
//
if (!function_exists('get_new_invoice')) {
  function get_new_invoice()
  {
    return Quote::count() ? str_pad( (Quote::all()->last()->invoice + 1), 6, '0', STR_PAD_LEFT) : '001000';
  }
}

if (!function_exists('get_months')) {
  function get_months()
  {
    return ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
  }
}

if (!function_exists('get_years')) {
  function get_years($min, $max) {
    $year = date('Y')*1;
    $years = [];
    for($y=$year-$min; $y<=$year+$max; $y++) {
      array_push($years, $y);
    }
    return $years;
  }
}

if (!function_exists('proper_case')) {
    function proper_case($str) {
        $str = snake_case(camel_case(class_basename($str)));
        $replaced = str_replace('_', ' ', $str);
        $proper = str_replace("patient ", "", "{$replaced}");
        
        return $proper;
    }
}

if (!function_exists('usernamify')) {
    function usernamify($name) {
        $username = str_replace(' ','_',$name).time();
        return $username;
    }
}


if (!function_exists('passwordify')) {
    function passwordify($name) {
        $password = Hash::make($name);
        return $password;
    }
}

if (!function_exists('emailify')) {
    function emailify($name) {
        $email = $name.'@example.com';
        return $email;
    }
}