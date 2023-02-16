<?php

// use Illuminate\Routing\Route;

use App\Models\Image;
use Illuminate\Support\Facades\Route;

if (!function_exists('getImage')) {
    function getImage($element, $thumb = false,$gallery = false)
    {  
        $url = "storage";
        // if($thumb) $url .= '/thumbs';
        if ($element->image != null) {
          return asset("{$url}/{$element->image->url}");
        }
        if ($gallery) {
          return asset("{$url}/{$element->url}");
         }
    }
}
if (!function_exists('getAvatar')) {
  function getAvatar($user)
  {  
      $url = "avatars";
        return asset("{$url}/{$user->avatar}");
  }
}

if (!function_exists('currentRoute')) {
  function currentRoute($route)
  {
      return Route::currentRouteNamed($route) ? ' class=current' : '';
  }
}

if (!function_exists('formatDate')) {
  function formatDate($date)
  {
      return ucfirst(utf8_encode ($date->formatLocalized('%d %B %Y')));
  }
}


if (!function_exists('currentRouteActive')) {
  function currentRouteActive(...$routes)
  {
      foreach ($routes as $route) {
          if(Route::currentRouteNamed($route)) return 'active';
      }
  }
}

if (!function_exists('currentChildActive')) {
  function currentChildActive($children)
  {
      foreach ($children as $child) {
          if(Route::currentRouteNamed($child['route'])) return 'active';
      }
  }
}

if (!function_exists('menuOpen')) {
  function menuOpen($children)
  {
      foreach ($children as $child) {
          if(Route::currentRouteNamed($child['route'])) return 'menu-open';
      }
  }
}

if (!function_exists('isRole')) {
  function isRole($role)
  {
      return auth()->user()->role === $role;
  }
}
if (!function_exists('formatHour')) {
  function formatHour($date)
  {
      return ucfirst(utf8_encode ($date->formatLocalized('%Hh%M')));
  }
}
if (!function_exists('getUrlSegment')) {
  function getUrlSegment($url, $segment)
  {   
      $url_path = parse_url(request()->url(), PHP_URL_PATH);
      $url_segments = explode('/', $url_path);
      return $url_segments[$segment];
  }
}