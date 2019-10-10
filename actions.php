<?php


/**
 * Implements cockpit.asset.upload event.
 */
$app->on('cockpit.asset.upload', function(&$asset, &$_meta, &$opts) {
  $file = $this->path("#tmp:") . '/' . $asset['title'];
  \Spatie\ImageOptimizer\OptimizerChainFactory::create()->optimize($file);
  $asset['size'] = filesize($file);
});
