<?php

c::set('routes', array(
  array(
    'pattern' => '(:any)',
    'action'  => function($uid) {

      $page = page($uid);

      if(!$page) $page = page('kuenstler/' . $uid);
      if(!$page) $page = site()->errorPage();

      return site()->visit($page);

    }
  ),
  // array(
  //   'pattern' => 'kuenstler',
  //   'action'  => function() {
  //     go('/');
  //   }
  // ),
  // array(
  //   'pattern' => 'home',
  //   'action'  => function() {
  //     go('/');
  //   }
  // ),
  array(
    'pattern' => 'kuenstler/(:any)',
    'action'  => function($uid) {
      go($uid);
    }
  ),
  array(
    'pattern' => array('kuenstler/(:any)/(:any)'),
    'action'  => function($parent) {
      go($parent);
    }
  )
  // array(
  //   'pattern' => 'api',
  //   'action'  => function() {
  //
  //     $site = site();
  //     $data = $site->api()->toStructure();
  //     $json = array();
  //
  //     foreach($data as $api) {
  //       $json[] = array(
  //         'title' => (string)$api->title()
  //       );
  //     }
  //
  //     return response::json($json);
  //   }
  // )
));
