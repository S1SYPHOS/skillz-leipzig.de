<?php

collection::$filters['is'] = function($collection, $field, $value) {

  foreach($collection->data as $key => $item) {
    if(collection::extractValue($item->victory(), $field) != $value) {
      unset($collection->$key);
    }
  }

  return $collection;

};
