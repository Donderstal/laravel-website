<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 5/8/19
 * Time: 3:22 PM
 */

namespace App\Http\Composers;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class AdminBreadcrumbComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $exists_parameters = Route::current()->originalParameters();
        $current_routes = explode('.', Route::currentRouteName());
        array_shift($current_routes);
        $new_name = 'admin.';
        $route_count = count($current_routes);
        $r = null;
        $cnt = 0;
        foreach ($current_routes as $key => $name) {
            $cnt++;
            if ($cnt == $route_count) {
                $route = null;
            } else {
                if (Route::has($new_name . $name)) {
                    $route = $new_name . $name;
                } else {
                    $route = $new_name . $name . '.index';
                }
                $new_name .= $name . (!empty($name) ? '.' : null);
                $route_prefix = Route::getRoutes()->getByName($route)->action['prefix'];
                preg_match_all('/(?<={).*?(?=})/', $route_prefix, $needed_parameters);
                $flatten_parameters = [];
                array_map(function($arr) use (&$flatten_parameters) {
                    $flatten_parameters = array_merge($flatten_parameters, $arr);
                }, $needed_parameters);
                $parameters = array_map(function($value_index) use ($exists_parameters) {
                    return $exists_parameters[$value_index];
                }, $flatten_parameters);
            }
            $items[(!empty($route) ? route($route, $parameters) : null)] = ucfirst($name == 'index' ? 'list' : $name);
        }

        $view->with(['breadcrumb' => $items]);
    }
}