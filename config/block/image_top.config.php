<?php

return array(
    'title'    => 'Image top',
    'view'     => 'novius_blocks::templates/{name}',
    'crud'     => array(
        'layout' => array(),
        'fields' => array(),
    ),
    'template' => array(
        'main_row'   => array(
            'col_left' => array(
                'fields' => array(
                    'block_title',
                ),
            ),
        ),
        'second_row' => array(
            'col_left' => array(
                'fields' => array(
                    'block_title',
                ),
            ),
        ),
    ),
);