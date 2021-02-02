# Image Optimizer add-on for Cockpit CMS

This add-on enhances Cockpit CMS by providing automatic image optimization when saving an asset image.
The image optimization is performed using the Spatie library - https://github.com/spatie/image-optimizer

## Installation

### Manual

Download [latest release](https://github.com/pauloamgomes/CockpitCMS-ImageOptimizer) and extract to `COCKPIT_PATH/addons/ImageOptimizer` directory

### Git

```sh
git clone https://github.com/pauloamgomes/CockpitCMS-ImageOptimizer.git ./addons/ImageOptimizer
```

### Cockpit CLI

```sh
php ./cp install/addon --name ImageOptimizer --url https://github.com/pauloamgomes/CockpitCMS-ImageOptimizer.git
```

### Composer

1. Make sure path to cockpit addons is defined in your projects' _composer.json_ file:

  ```json
  {
      "name": "MY_PROJECT",
      "extra": {
          "installer-paths": {
              "cockpit/addons/{$name}": ["type:cockpit-module"]
          }
      }
  }
  ```

2. In your project root run:

  ```sh
  composer require pauloamgomes/cockpitcms-imageoptimizer
  ```

---

## Configuration

By default the Spatie library will use these optimization binaries if they are present on your system:

- [JpegOptim](http://freecode.com/projects/jpegoptim)
- [Optipng](http://optipng.sourceforge.net/)
- [Pngquant 2](https://pngquant.org/)
- [SVGO](https://github.com/svg/svgo)
- [Gifsicle](http://www.lcdf.org/gifsicle/)
- [cwebp](https://developers.google.com/speed/webp/docs/precompiled)

More details about that on https://github.com/spatie/image-optimizer#optimization-tools.

No additional configuration is required.

## Usage

Add-on is fully transparent to the user, performing the optimization when uploading an asset. In the below example we can see the upload of two images (png and jpg) without the addon and the difference after enabling it:

![Example screencast](https://monosnap.com/image/qfcNF9hojfxOVMEiZ2INA98ME7SVna)

If you have already a bunch of asset images that are not optimized you can run the cli command, e.g.:

```
wodby@php.container:/var/www/html $ ./cp images-optimize
Optimizing 3 assets! Please wait...

/2019/10/10/5d9f01a9f1767desert-sunrise-600-300.jpg optimized! From 78.39 KB to 25.61 KB
/2019/10/10/5d9f01ad9a054dandelion-600-300.jpg optimized! From 80.72 KB to 28 KB
/2019/10/10/5d9f01b12b23bpexels-photo-laptop.jpg optimized! From 64.21 KB to 59.1 KB

Done! 3 assets updated in 3.16s.
```

## Copyright and license

Copyright 2019 pauloamgomes under the MIT license.
