<?php
/**
 * Novius Blocks
 *
 * @copyright  2014 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

namespace Novius\Blocks;

class Controller_Admin_Display_Crud extends \Nos\Controller_Admin_Crud
{
    public function before_save($item, $data) {
        $item->blod_mode = \Input::post('blod_mode');
    }
}
