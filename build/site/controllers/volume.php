<?php

return function($site, $pages, $page) {

  // create sorted $artists array with all artists
  $uid     = $page->uid();
  $all     = $site->find('kuenstler')->children();
  $some    = $all->filter(function($child) use($uid) { return $child->children()->findBy('uid', $uid); });
  $artists = $some->sortBy('title');

  // create $categories array with all categories
  $global_categories = [
    'Album',
    'Artwork',
    'DJ',
    'EP',
    'Künstler',
    'Liveact',
    'Producer/Beatmaker',
    'Props aus Leipzig',
    'Punchline',
    'Track',
    'Veranstaltung',
    'Video'
  ];


  // pass all variables to the template
  return compact(
    'uid',
    'artists',
    'global_categories'
  );

};
