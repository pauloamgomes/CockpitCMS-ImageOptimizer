# Image Optimizer add-on for Cockpit CMS

This add-on enhances Cockpit CMS by providing automatic image optimization when saving an asset image.
The image optimization is performed using the Spatie library - https://github.com/spatie/image-optimizer

## Installation

Download and unpack add-on to `<cockpit-folder>/addons/ImageOptimizer` folder.
By default the Spatie library will detect any optimization binaries on your system and use them, more details about that on https://github.com/spatie/image-optimizer#optimization-tools.

## Configuration

No additional configuration is required.

## Usage

Add-on is fully transparent to the user, acting when uploading or saving an providing the required optimization. In the below example we can see the upload of two images (png and jpg) without the addon and the difference after enabling it:

![Example screencast](https://monosnap.com/image/qfcNF9hojfxOVMEiZ2INA98ME7SVna)

## Copyright and license

Copyright 2019 pauloamgomes under the MIT license.
