<?php
/**
 * Novius Blocks
 *
 * @copyright  2014 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link       http://www.novius-os.org
 */

return array(
    'model_compatibility' => array(
        'view' => 'novius_blocks::admin/block/model_compatibility',
    ),
    'css' => array('static/apps/novius_blocks/css/admin/block.css'),
    'controller_url'      => 'admin/novius_blocks/block/crud',
    'model'               => 'Novius\Blocks\Model_Block',
    'layout'              => array(
        'large'   => true,
        'save'    => 'save',
        'title'   => 'block_title',
        'content' => array(
            'template' => array(
                'view'   => 'nos::form/expander',
                'params' => array(
                    'title'    => __('Block type'),
                    'nomargin' => true,
                    'options'  => array(
                        'allowExpand' => true,
                    ),
                    'content'  => array(
                        'view'   => 'novius_blocks::admin/block/template',
                        'params' => array(
                            'fields' => array(
                                'block_template',
                            ),
                        ),
                    ),
                ),
            ),
            /*
            'image' => array(
                'view' => 'nos::form/expander',
                'params' => array(
                    'title'   => __('Image'),
                    'nomargin' => false,
                    'options' => array(
                        'allowExpand' => true,
                        'fieldset' => 'image',
                    ),
                    'content' => array(
                        'view' => 'nos::form/fields',
                        'params' => array(
                            'fields' => array(
                                'medias->image->medil_media_id',
                            ),
                        ),
                    ),
                ),
            ),
            'description' => array(
                'view' => 'nos::form/expander',
                'params' => array(
                    'title'   => __('Description'),
                    'nomargin' => false,
                    'options' => array(
                        'allowExpand' => true,
                        'fieldset' => 'description',
                    ),
                    'content' => array(
                        'view' => 'nos::form/fields',
                        'params' => array(
                            'fields' => array(
                                'wysiwygs->description->wysiwyg_text',
                            ),
                        ),
                    ),
                ),
            ),
            'link' => array(
//                'view' => 'nos::form/expander',
                'view' => 'novius_blocks::admin/block/link',
                'params' => array(
                    'title'   => __('Link'),
                    'nomargin' => false,
                    'options' => array(
                        'allowExpand' => true,
                        'fieldset' => 'link',
                    ),
                    'content' => array(
                        'view' => 'nos::form/fields',
                        'params' => array(
                            'fields' => array(
                                'block_link',
                                'block_link_title',
                                'block_link_new_page',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'menu' => array(
            'accordion' => array(
                'view' => 'nos::form/accordion',
                'params' => array(
                    'accordions' => array(
                        'columns' => array(
                            'title' => __('Groups'),
                            'fields' => array(
                                'columns'
                            ),
                        ),
                        'connection_model' => array(
                            'title' =>  __('Link with a model'),
                            'view' => 'novius_blocks::admin/block/connection_model',
                            'fields' => array(
                                'model_autocomplete',
                                'block_model_id',
                                'block_model',
                            ),
                        ),
                        'params' => array(
                            'title' => __('Configuration'),
                            'fields' => array(
                                'block_class',
                            ),
                        ),
                    ),
                ),
            ),*/
        ),
    ),
    'fields'              => array(
        'block_id'    => array(
            'label'     => 'ID: ',
            'form'      => array(
                'type' => 'hidden',
            ),
            'dont_save' => true,
        ),
        'block_title' => array(
            'label'      => __('Title'),
            'form'       => array(
                'type' => 'text',
            ),
            'validation' => array('required'),
        ),

        'block_template' => array(
            'label' => '',
            'validation' => array(
                'required',
            ),
        ),
        /*
        'wysiwygs->description->wysiwyg_text' => array(
            'label' => __('Description'),
            'renderer' => 'Nos\Renderer_Wysiwyg',
            'template' => '{field}',
            'form' => array(
                'style' => 'width: 100%; height: 200px;',
            ),
        ),
        'medias->image->medil_media_id' => array(
            'label' => '',
            'renderer' => 'Nos\Renderer_Media',
            'form' => array(
                'title' => __('Image'),
            ),
        ),
        'block_link' => array(
            'label' => __('Link'),
            'description' => '',
        ),
        'block_link_title' => array(
            'label' => __('Text of the link'),
        ),
        'block_link_new_page' => array(
            'label' => __('Open in a new page'),
            'form' => array(
                'type' => 'checkbox',
                'value' => 1,
            ),
        ),
        'block_class' => array(
            'label' => __('Class'),
            'form' => array(
                'type' => 'text',
            ),
        ),
        'columns' => array(
            'renderer' => 'Novius\Renderers\Renderer_Multiselect',
            'label' => __('Groups'),
            'form' => array(
                'options' => array(),
                'style' => array(
                    'width' => '70%'
                )
            ),
            'populate' => function($item) {
                if (!empty($item->columns)) {
                    return array_keys($item->columns);
                } else {
                    return array();
                }
            },
            'before_save' => function($item, $data) {
                $item->columns;
                unset($item->columns);
                if (!empty($data['columns'])) {
                    foreach ($data['columns'] as $blco_id) {
                        if (ctype_digit($blco_id) ) {
                            $item->columns[$blco_id] = \Novius\Blocks\Model_Column::find($blco_id);
                        }
                    }
                }
            },
        ),
        'block_model' => array(
            'form' => array(
                'type' => 'hidden',
            ),
        ),
        'model_autocomplete' => array(
            'label' => __('Search the item'),
            'renderer' => '\Novius\Renderers\Renderer_Autocomplete',
            'form' => array(),
            'renderer_options' => array(
                'data' => array(
                    'data-autocomplete-url' => 'admin/novius_blocks/block/crud/autocomplete_model',
                    'data-maj_url' => '1',
                    'data-autocomplete-callback' => 'click_model',
                )
            ),
            'populate' => function($item){
            },
            'dont_save' => true,
        ),
        'block_model_id' => array(
            'form' => array(
                'type' => 'hidden',
            ),
        ),
        'save' => array(
            'label' => '',
            'form' => array(
                'type' => 'submit',
                'tag' => 'button',
                'value' => __('Save'),
                'class' => 'primary',
                'data-icon' => 'check',
            ),
        ),*/
    )
);