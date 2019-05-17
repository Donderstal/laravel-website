<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 5/8/19
 * Time: 3:22 PM
 */

namespace App\Http\Composers;

use Illuminate\View\View;

class AdminNavigationComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {

        $header_items = config('site.admin.navigation.header');

        // walk on administration header navigation items to change the routes to the links
        array_walk($header_items, $walk = function (&$value, $key) use (&$walk) {
            if (isset($value['route'])) {
                $value['link'] = route($value['route']);
                unset($value['route']);
            }

            // set default link for each item
            if (!isset($value['link'])) {
                $value['link'] = null;
            }

            // set children default to null
            if (!isset($value['children'])) {
                $value['children'] = [];
            }

            // set icon default to null
            if (!isset($value['icon'])) {
                $value['icon'] = null;
            }

            if (count($value['children'])) {
                foreach ($value['children'] as $k => &$child) {
                    $walk($child, $k);
                }
            }
        });

        $view->with(['admin_header_items' => $header_items]);
    }
}