<?php

// Be sure to read this:: https://getkirby.com/docs/installation/panel
// c::set('panel.install', true);

include kirby()->roots()->config() . '/languages.php';
include kirby()->roots()->config() . '/routes.php';

/*

---------------------------------------
Development settings
---------------------------------------

Debugging mode, see here: https://getkirby.com/docs/developer-guide/troubleshooting/debugging
Multi-environment-setup, see here: https://getkirby.com/docs/developer-guide/configuration/options
Asset-fingerprinting, see here: https://github.com/iksi/kirby-fingerprint
HTML Minification, see here: https://github.com/iksi/kirby-compress

*/

c::set('env', 'development');
c::set('debug', true);
c::set('thumbs.driver','im');
c::set('plugin.embed.video.lazyload', false);
c::set('plugin.ga.id', 'UA-89033409-1');
c::set('textarea.autocomplete', true);

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/
