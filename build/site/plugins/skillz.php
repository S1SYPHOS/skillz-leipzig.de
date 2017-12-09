<?php

// Filters award winners from nominee array
collection::$filters['is'] = function($collection, $field, $value) {

  foreach($collection->data as $key => $item) {
    if(collection::extractValue($item->victory(), $field) != $value) {
      unset($collection->$key);
    }
  }

  return $collection;

};


function validateForm($data) {

  $response = array();

  // if the honeypot is filled, we set the redirect key to true
  if(!empty($data['website'])) {
    $response['redirect'] = true;

  } else {

    // array of rules for form validation
    $rules = array(
      'title'  => array('required'),
      'category'  => array('required'),
    );

    // array of messages to return if some of the data is not valid
    $messages = array(
      'title'  => '.. wen jetzt genau?',
      'category'  => '.. wofür jetzt genau?',
    );

    // evaluate data and rules using the invalid() helper
    if($invalid = invalid($data, $rules, $messages)) {
      $response['errors'] = $invalid;
    } else {
      $response['success'] = true;
    }

  }

  return $response;
}


function addToStructure($p, $field, $data = array()) {

  $response = array();

  // escape user data
  $data = array(
    'title'    => esc($data['title']),
    'category' => esc($data['category']),
    'text'     => esc($data['text']),
  );

  // try to add data to field
  try {
    $fieldData = $p->$field()->yaml();
    $fieldData[] = $data;
    $fieldData = yaml::encode($fieldData);
    $p->update(array(
      $field => $fieldData,
    ));

    // create the body from a simple snippet
    $body  = snippet('mail', $data, true);
    $site = site();

    // build the email
    $email = email(array(
      'from'    => 'vorschlag@skillz-leipzig.de',
      'to'      => $site->send_mail(),
      'cc'      => $site->user('two-brain')->email(),
      'subject' => 'Neuer Vorschlag',
      'replyTo' => $site->send_mail(),
      'body'    => $body
    ));

    // try to send it and redirect to the thank you page if it worked
    if($email->send()) {
      go('danke');

    // add the error to the alert list if it failed
    } else {
      $alert = array($email->error());
    }

    // if successful, add success message to $response array
    $response['success'] = "<h3>Danke!</h3>";

  } catch(Exception $e) {

    // if it fails, add error message to $response array
    $response['error'] = 'Da ist etwas schiefgegangen: ' . $e->getMessage();

  }

  return $response;

}
