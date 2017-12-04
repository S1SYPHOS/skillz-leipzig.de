<?php

// Languages

c::set('languages', array(
  array(
    'code'    => 'de',
    'name'    => 'Deutsch',
    'default' => true,
    'url'     => '/',
    'locale'  => 'de_DE',
  ),
  array(
    'code'    => 'en',
    'name'    => 'English',
    'url'     => '/en',
    'locale'  => 'en_US',
  ),
));

c::set('language.detect', false);
