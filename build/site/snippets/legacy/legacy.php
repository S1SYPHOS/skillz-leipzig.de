<?php foreach ($artists as $artist) : ?>
<?php
  $artistCats = $artist->find($uid)->tags()->split(',');
  $categories =  $artist->find($uid)->awards()->yaml();
  $awards = array();
  foreach ($categories as $key => $value) { $awards[] = $value['category']; }
  $nominations = array_diff($artistCats, $awards);
  sort($nominations);
?>
        <?php foreach ($awards as $award) : ?>
        <img src="/assets/images/award.svg" title="<?= $award ?>">
        <?php endforeach ?>

        <?php foreach ($nominations as $nomination) : ?>
        <img src="/assets/images/nomination.svg" title="<?= $nomination ?>">
        <?php endforeach ?>
<?php endforeach ?>

<?php

return function($site, $pages, $page) {

  // create sorted $tags array with all year-specific tags
  $uid     = $page->uid();
  $all     = $site->find('kuenstler')->children();
  $some    = $all->filter(function($child) use($uid) { return $child->children()->findBy('uid', $uid); });
  $artists = $some->sortBy('title');
  $tags    = $artists->children()->filterBy('uid', $uid)->pluck('tags', ',', true);
  sort($tags);

  // pass all variables to the template
  return compact(
    'uid',
    'artists',
    'tags'
  );

};


page::$methods['getNext'] = function($page, Children $siblings, $sort = array(), $visibility = false) {
  if($sort) $siblings = call(array($siblings, 'sortBy'), $sort);
  $index = $siblings->indexOf($page);
  if($index === false) return null;
  if($visibility) {
    $siblings = $siblings->offset($index+1);
    $siblings = $siblings->{$visibility}();
    return $siblings->first();
  } else {
    return $siblings->nth($index + 1);
  }
};

page::$methods['getPrev'] = function($page, Children $siblings, $sort = array(), $visibility = false) {
  if($sort) $siblings = call(array($siblings, 'sortBy'), $sort);
  $index = $siblings->indexOf($page);
  if($index === false or $index === 0) return null;
  if($visibility) {
    $siblings = $siblings->limit($index);
    $siblings = $siblings->{$visibility}();
    return $siblings->last();
  } else {
    return $siblings->nth($index - 1);
  }
};
