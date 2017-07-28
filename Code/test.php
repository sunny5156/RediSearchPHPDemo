<?php

$loader = require_once  './vendor/autoload.php';

$loader->add('Ehann\\', __DIR__);

use Ehann\RediSearch\Index;
use Ehann\RediSearch\Fields\TextField;
use Ehann\RediSearch\Fields\NumericField;
use Ehann\RediSearch\Redis\RedisClient;

set_time_limit(0);

$redis = new RedisClient('Redis', '127.0.0.1', 6379, 0, '');