<?php
return array(
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => null,
        'data' => null
    ),
    '1' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Caller',
        'children' => array(
            'guest', // унаследуемся от гостя
        ),
        'bizRule' => null,
        'data' => null
    ),
 		'6' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'TopCaller', //Юлия Плескач
        'children' => array(
            'guest', // унаследуемся от гостя
        ),
        'bizRule' => null,
        'data' => null
    ), 
    '2' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Manager',
        'children' => array(
            'caller',          // позволим модератору всё, что позволено пользователю
        ),
        'bizRule' => null,
        'data' => null
    ),
 '3' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Seo_manager',
        'children' => array(
            'manager',          // позволим модератору всё, что позволено пользователю
        ),
        'bizRule' => null,
        'data' => null
    ),

 '4' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'ProjectManager',
        'children' => array(
            'seo_manager',          // позволим модератору всё, что позволено пользователю
        ),
        'bizRule' => null,
        'data' => null
    ),

    '5' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Administrator',
        'children' => array(
            'boss',         // позволим админу всё, что позволено модератору
        ),
        'bizRule' => null,
        'data' => null
    ),
);