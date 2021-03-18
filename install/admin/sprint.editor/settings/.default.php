<?
$settings = [
   'layout_enabled' => [
         'layout_none',
   ],
   'block_settings' => [
      "my_image" =>   [
         'width' => [
            'type' => 'select',
            'default' => '12',
            'value' => [
               '4' => '25%',
               '6' => '50%',
               '12' => '100%',
            ]
         ]
      ],
      "my_lists" =>  [
         'type' => [
            'type' => 'select',
            'default' => 'ul',
            'value' => [
               'ul' => 'Маркированный',
               'ol' => 'Нумерованный',
            ]
         ]
      ]
   ]
];
?>