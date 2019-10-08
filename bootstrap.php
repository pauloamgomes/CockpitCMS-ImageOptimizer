<?php

require __DIR__ . '/vendor/autoload.php';

if (COCKPIT_ADMIN || COCKPIT_API_REQUEST || COCKPIT_CLI) {
  include_once __DIR__ . '/actions.php';
}
