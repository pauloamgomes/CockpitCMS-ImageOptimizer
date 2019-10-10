<?php

/**
 * @file
 * Implements CLI Command for optimizing file size of all asset images.
 */

if (!COCKPIT_CLI) {
  return;
}

$assets = $app->module('cockpit')->listAssets();

if (!$assets || empty($assets['assets'])) {
  return CLI::writeln("No assets found!", FALSE);
}

$start = microtime(TRUE);
$count = 0;

CLI::writeln("Optimizing {$assets['total']} assets! Please wait...");
CLI::writeln("");

foreach ($assets['assets'] as $asset) {
  $file = $app->path("#uploads:{$asset['path']}");
  \Spatie\ImageOptimizer\OptimizerChainFactory::create()->optimize($file);
  $original_size = $app->helper('utils')->formatSize($asset['size']);
  $asset['size'] = filesize($file);
  $new_size = $app->helper('utils')->formatSize($asset['size']);
  $app->storage->save('cockpit/assets', $asset);
  $app->filestorage->update("assets://{$asset['path']}", file_get_contents($file), ['mimetype' => $asset['mime']]);
  CLI::writeln("{$asset['path']} optimized! From {$original_size} to {$new_size}");
  $count++;
}

$seconds = round(microtime(TRUE) - $start, 2);
CLI::writeln("");
CLI::writeln("Done! {$count} assets updated in {$seconds}s.");
