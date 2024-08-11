<?php

use App\Http\Controllers\DropboxController;
use App\Models\AdminLog;
use App\Models\AdminMenu;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

// color
if (!defined('COLOR_PRIMARY')) {
    define('COLOR_PRIMARY', '#0d6efd');
}
if (!defined('COLOR_DANGER')) {
    define('COLOR_DANGER', '#dc3545');
}
if (!defined('COLOR_SUCCESS')) {
    define('COLOR_SUCCESS', '#198754');
}
if (!defined('COLOR_INFO')) {
    define('COLOR_INFO', '#0dcaf0');
}
if (!defined('COLOR_SECONDARY')) {
    define('COLOR_SECONDARY', '#6c757d');
}
if (!defined('COLOR_LIGHT')) {
    define('COLOR_LIGHT', '#f8f9fa');
}
if (!defined('COLOR_DARK')) {
    define('COLOR_DARK', '#212529');
}
if (!defined('COLOR_WARNING')) {
    define('COLOR_WARNING', '#ffc107');
}
if (!defined('COLORS')) {
    // get array color
    define('COLORS', [
        COLOR_PRIMARY => '#0d6efd',
        COLOR_DANGER => '#dc3545',
        COLOR_SUCCESS => '#198754',
        COLOR_INFO => '#0dcaf0',
        COLOR_SECONDARY => '#6c757d',
        COLOR_LIGHT => '#f8f9fa',
        COLOR_DARK => '#212529',
        COLOR_WARNING => '#ffc107'
    ]);
}
if (!defined('MAX_FILE_SIZE_UPLOAD')) {
    define('MAX_FILE_SIZE_UPLOAD', (5 * 1024));
}
if (!function_exists('generateRandomString')) {
    // generate code
    function generateRandomString($length = 10,  $is_number = false)
    {
        if ($is_number == true) {
            $length -= 1;
            return ($length > 0) ? random_int(1, 9) . substr(str_shuffle(str_repeat($x = '0123456789', ceil($length / strlen($x)))), 1, $length) : '';
        }
        return ($length > 0) ? substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length) : '';
    }
}

if (!function_exists('get_ip_client')) {
    // detect ip action
    function get_ip_client()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        return $ipaddress;
    }
}

if (!function_exists('get_device_client')) {
    // detect device action
    function get_device_client()
    {
        return $_SERVER['HTTP_USER_AGENT'] ?? '';
    }
}

if (!function_exists('showLog')) {
    function showLog(\Throwable $th)
    {
        Log::error([
            'message' => $th->getMessage(),
            'line' => $th->getLine(),
            'file' => $th->getFile(),
        ]);
    }
}

if (!function_exists('previousUrl')) {
    function previousUrl()
    {
        return url()->previous();
    }
}
if (!function_exists('format_number')) {
    function format_number($number, $unit = 'đ')
    {
        return number_format($number, 0) . " $unit";
    }
}
if (!function_exists('generate_limit_select')) {
    function generate_limit_select($values = [10, 20, 50, 100], $modal = "", $class = "form-filter")
    {
        $data_modal = $modal ? "data-modal='$modal'" : '';
        $string = '<div class="w-75px mx-1"><select name="limit" class="form-select filter-limit ' . $class . '" ' . $data_modal . '>';
        foreach ($values as $key => $v) {
            $selected = $key == 0 ? ' selected' : '';
            $string .= '<option value="' . $v . '" ' . $selected . '>' . $v . '</option>';
        }
        $string .= '</select></div>';
        return $string;
    }
}

if (!function_exists('admin_save_log')) {
    function admin_save_log($content, $link = '', $admin_id = null)
    {
        AdminLog::create([
            'content' => $content,
            'link' => $link,
            'admin_id' => $admin_id,
        ]);
    }
}

if (!function_exists('get_menu_admin')) {
    function get_menu_admin()
    {
        return AdminMenu::with('menus')->whereNull('parent_id')->orderBy('numering', 'ASC')->get();
    }
}
if (!function_exists('check_active_menu')) {
    function check_active_menu($menus, $class = 'active')
    {
        return in_array(Route::currentRouteName(), $menus) ? $class : '';
    }
}

if (!defined('MAX_FILE_SIZE_UPLOAD')) {
    define('MAX_FILE_SIZE_UPLOAD', (5 * 1024));
}

if (!function_exists('get_link_public')) {
    function get_link_public($full_link)
    {
        $url = str_replace(env('APP_URL') . '/', '', $full_link);
        return $url;
    }
}

if (!function_exists('get_url')) {
    function get_url($uri)
    {
        $dropbox =  new DropboxController();
        return $dropbox->url($uri);
    }
}

if (!function_exists('store_file')) {
    function store_file($file, $uri)
    {
        $dropbox =  new DropboxController();
        return $dropbox->store($file, $uri);
    }
}

if (!function_exists('delete_file')) {
    function delete_file($uri)
    {
        $dropbox =  new DropboxController();
        return $dropbox->delete($uri);
    }
}
