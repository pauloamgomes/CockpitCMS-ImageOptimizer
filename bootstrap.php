<?php
/**
 * Cockpit image optimizer addon
 *
 * @author  Paulo Gomes
 * @package CockpitCMS-ImageOptimizer
 * @license MIT
 *
 * @source  https://github.com/pauloamgomes/CockpitCMS-ImageOptimizer
 * @see     { README.md } for usage info.
 */

require __DIR__ . '/vendor/autoload.php';

if (COCKPIT_ADMIN || COCKPIT_API_REQUEST) {
  include_once __DIR__ . '/actions.php';
}

// CLI includes.
if (COCKPIT_CLI) {
  $this->path('#cli', __DIR__ . '/cli');
}
