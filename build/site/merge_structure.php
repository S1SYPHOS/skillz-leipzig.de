function createNewStructure($pages, $field) {
  // instantiate a new structure object
  $structure = new Structure();

  $key = 0;

  // loop through the pages collection
  foreach($pages as $p) {

    //loop through the structure object of each page
    foreach($p->$field()->toStructure() as $item) {

      // append each entry to the new structure object
      $structure->append($key, $item);

      $key++;
    }
  }

  return $structure;
}