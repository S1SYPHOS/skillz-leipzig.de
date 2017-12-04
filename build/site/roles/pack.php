<?php

return [
  'id'          => 'pack',
  'name'        => 'Redakteur',
  'default'     => true,
  'permissions' => [
    '*'                 => true,
    'panel.site.update' => false,
    'panel.avatar.*'    => function() {
      return $this->user()->is($this->target()->user());
    },
    'panel.user.*'      => false,
    'panel.user.read'   => true,
    'panel.user.update' => function() {
      return $this->user()->is($this->target()->user());
    }
  ]
];
