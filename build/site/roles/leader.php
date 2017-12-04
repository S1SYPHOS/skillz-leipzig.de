<?php

return [
  'id'          => 'chief',
  'name'        => 'Chefredakteur',
  'default'     => false,
  'permissions' => [
    '*'                 => true,
    'panel.site.update' => false,
    'panel.avatar.*'    => function() {
      return $this->user()->is($this->target()->user());
    },
    'panel.user.*'      => false,
    'panel.user.read'   => true,

    // permissions to add, remove & update users of lower rank
    'panel.user.create' => true,
    'panel.user.delete' => true,
    'panel.user.update' => true,

    // permission to update $site
    'panel.site.update' => true
  ]
];
