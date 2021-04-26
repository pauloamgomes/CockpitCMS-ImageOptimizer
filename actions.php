<?php

use Spatie\ImageOptimizer\OptimizerChain;

use Spatie\ImageOptimizer\Optimizers\Cwebp;
use Spatie\ImageOptimizer\Optimizers\Gifsicle;
use Spatie\ImageOptimizer\Optimizers\Jpegoptim;
use Spatie\ImageOptimizer\Optimizers\Optipng;
use Spatie\ImageOptimizer\Optimizers\Pngquant;
use Spatie\ImageOptimizer\Optimizers\Svgo;

$BIN_PATH      = str_replace(DIRECTORY_SEPARATOR, '/', __DIR__).'/binaries';

$jpegQuality   = '--max=85';
$pngQuality    = '--quality=85';

/**
 * Create custom optimization chain
 *
 * @see https://github.com/spatie/image-optimizer#creating-your-own-optimization-chains
 */
$spatie        = new OptimizerChain();
$jpegoptim     = new Jpegoptim([ $jpegQuality, '--strip-all', '--all-progressive']);
$pngquant      = new Pngquant([ $pngQuality, '--force' ]);
$optipng       = new Optipng([ '-i0', '-o2', '-quiet' ]);
$svgo          = new Svgo([ '--disable={cleanupIDs,removeViewBox}' ]);
$gifsicle      = new Gifsicle([ '-b', '-O3', ]);
$cwebp         = new Cwebp([ '-m 6', '-pass 10', '-mt', '-q 80' ]);

// helper function to detect necessary executables
$where         = function ($command) {
  return is_executable(shell_exec((strpos(PHP_OS, 'WIN') === 0 ? 'where ' : 'command -v ').$command));
};

switch(PHP_OS) {
    case 'Darwin':
    case 'FreeBSD':
    case 'Linux':
    case 'SunOS':
    case 'WINNT':

        // path to precompiled binaries
        $BIN_PATH .= '/'.PHP_OS;

        // append ".exe" for windows binaries
        if (PHP_OS === 'WINNT') {
            $jpegoptim->binaryName .= '.exe';
            $pngquant ->binaryName .= '.exe';
            $optipng  ->binaryName .= '.exe';
            $svgo     ->binaryName .= '.exe';
            $gifsicle ->binaryName .= '.exe';
            $cwebp    ->binaryName .= '.exe';
        }

        foreach ([$jpegoptim, $pngquant, $optipng, $svgo, $gifsicle, $cwebp] as $optimizer) {

          // if installed, use system binaries
          if ($where($optimizer->binaryName)) {
            $spatie   ->addOptimizer($optimizer);
          }

          // if bundled, use precompiled binaries
          else if (is_executable("$BIN_PATH/$optimizer->binaryName")) {
            $optimizer->setBinaryPath($BIN_PATH);
            $spatie   ->addOptimizer($optimizer);
          }

        }

        break;

}

/**
 * Implements cockpit.asset.upload event.
 */
$app->on('cockpit.asset.upload', function(&$asset, &$_meta, &$opts) use($spatie) {
  $file = $this->path("#tmp:") . '/' . $asset['title'];
  $spatie->optimize($file);
  $asset['size'] = filesize($file);
});
