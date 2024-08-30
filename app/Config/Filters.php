<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
  public array $aliases = [
    'csrf' => CSRF::class,
    'toolbar' => DebugToolbar::class,
    'honeypot' => Honeypot::class,
    'invalidchars' => InvalidChars::class,
    'secureheaders' => SecureHeaders::class,
    'cors' => \App\Filters\Cors::class,
    'forcehttps' => ForceHTTPS::class,
    'pagecache' => PageCache::class,
    'performance' => PerformanceMetrics::class,
  ];

  public array $required = [
    'before' => [
      'forcehttps',
      'pagecache',
    ],
    'after' => [
      'pagecache',
      'performance',
      'toolbar',
    ],
  ];

  public array $globals = [
    'before' => [
      'cors', // Apply CORS filter to all routes before request
    ],
    'after' => [
      'cors', // Apply CORS filter to all routes after response
    ],
  ];

  public array $methods = [];

  public array $filters = [];
}
