<?php

/**
 * Implements cockpit.asset.save event.
 */
$app->on('cockpit.asset.save', function(&$asset) {  
  $file = $this->path("#uploads:{$asset['path']}");
  $mime = $asset['mime'] ?? mime_content_type($file);

  $optimizerChain = \Spatie\ImageOptimizer\OptimizerChainFactory::create();
  $optimizerChain->optimize($file);
  $asset['size'] = filesize($file);
});
