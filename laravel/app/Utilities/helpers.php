<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 5/9/19
 * Time: 4:46 PM
 */

use Illuminate\Support\Facades\Session;

if (!function_exists('flash_message')) {
    /**
     * Set return message in flash session.
     *
     * @param string $message
     * @param string $type
     * @return bool
     */
    function flash_message($message, $type = 'info')
    {
        return session()->flash('message', [
            'type' => $type,
            'text' => $message
        ]);
    }
}

if (!function_exists('show_flash_message')) {
    /**
     * Set return message in flash session.
     *
     * @param string $message
     * @param string $type
     * @return bool
     */
    function show_flash_message($message = 'message')
    {
        if (Session::has($message)) {
            $types = ['warning', 'success', 'error', 'info'];
            return 'toastr.' .
                (in_array(Session::get('message')['type'], $types) ? Session::get('message')['type'] : 'info') .
                '("' . Session::get('message')['text'] . '");';
        }
    }
}
