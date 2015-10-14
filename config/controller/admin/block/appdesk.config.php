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
    'model'       => 'Novius\Blocks\Model_Block',
    'search_text' => 'block_title',
    'query'       => array(
        'callback' => array(function ($query) {
            return $query->where('block_hidden', 0);
        }
        )
    ),
    'inspectors'  => array(
        'column',
        'display',
    ),
);
