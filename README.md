# Image Optimizer add-on for Cockpit CMS

This add-on enhances Cockpit CMS by providing automatic image optimization when saving an asset image.
The image optimization is performed using the Spatie library - https://github.com/spatie/image-optimizer

## Installation

Download and unpack add-on to `<cockpit-folder>/addons/ImageOptimizer` folder.
By default the Spatie library will detect any optimization binaries on your system and use them, more details about that on https://github.com/spatie/image-optimizer#optimization-tools.

## Configuration

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
