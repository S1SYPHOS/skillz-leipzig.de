<?php

  $data_artists = $site->api_artists()->toStructure();
  $data_events = $site->api_events()->toStructure();
  $data_total = $data_artists->merge($data_events);

  $json = array();

  foreach($data_total as $api) {
    $json[] = array(
      'title' => (string)$api->title()
    );
  }

  echo json_encode($json);
