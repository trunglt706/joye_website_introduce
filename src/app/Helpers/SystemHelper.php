<?php

use App\Http\Controllers\DropboxController;
use App\Models\AdminLog;
use App\Models\AdminMenu;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

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

if (!defined('CACHE_TIME')) {
    define('CACHE_TIME', 60000);
}

if (!function_exists('get_menu_admin')) {
    function get_menu_admin()
    {
        if (Cache::has('menu_admin')) {
            $data = Cache::get('menu_admin');
        } else {
            $data = Cache::remember('menu_admin', CACHE_TIME, function () {
                return AdminMenu::with('menus')->whereNull('parent_id')->orderBy('numering', 'ASC')->get();
            });
        }
        return $data;
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
    function get_url($uri, $storage = false)
    {
        // if ($storage) {
        //     $dropbox =  new DropboxController();
        //     return $dropbox->url($uri);
        // }
        return asset($uri);
    }
}

if (!function_exists('store_file')) {
    function store_file($file, $uri, $storage = false, $width = null, $height = null)
    {
        if ($storage) {
            $dropbox =  new DropboxController();
            return $dropbox->store($file, $uri);
        } else {
            $name_random = time() . generateRandomString(5);
            $filename = $name_random . '.' . $file->getClientOriginalExtension();
            $path = $uri . '/' . $filename;
            if (!File::exists($uri)) {
                File::makeDirectory($uri, $mode = 0777, true, true);
            }
            if ($width && $height) {
                Image::make($file)->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path);
            } else {
                Image::make($file)->save($path);
            }
            return $path;
        }
    }
}

if (!function_exists('delete_file')) {
    function delete_file($uri, $storage = false)
    {
        if ($storage) {
            $dropbox =  new DropboxController();
            return $dropbox->delete($uri);
        }
        return File::delete($uri);
    }
}

if (!function_exists('get_option')) {
    function get_option($code, $default = '')
    {
        $key = "option-$code";
        if (Cache::has($key)) {
            $data = Cache::get($key);
        } else {
            $data = Cache::remember($key, CACHE_TIME, function () use ($code, $default) {
                $setting = Setting::ofCode($code)->select('type', 'value')->first();
                if ($setting && $setting->type == Setting::TYPE_FILE) {
                    return get_url($setting->value) ?? $default;
                }
                return $setting && $setting->value ? $setting->value : $default;
            });
        }
        return $data;
    }
}

if (!function_exists('get_menu')) {
    function get_menu()
    {
        return [
            [
                'code' => route('v2.about'),
                'name' => 'Về JOYE',
                'active' => ['v2.about']
            ],
            [
                'code' => route('v2.service'),
                'name' => 'Dịch vụ',
                'active' => ['v2.service', 'v2.service.detail']
            ],
            [
                'code' => route('v2.blog'),
                'name' => 'Blog',
                'active' => ['v2.blog', 'v2.blog.detail']
            ],
            [
                'code' => route('v2.contact'),
                'name' => 'Liên hệ',
                'active' => ['v2.contact']
            ],
            [
                'code' => route('v2.home'),
                'name' => 'Big Heart MCN',
                'active' => []
            ],
        ];
    }
}

if (!defined('GUEST_PARTNER')) {
    define('GUEST_PARTNER', 'guest-partners');
}

if (!defined('GUEST_SERVICE_GROUP')) {
    define('GUEST_SERVICE_GROUP', 'guest-service_groups');
}

if (!defined('GUEST_SERVICE_GROUP_SHORT')) {
    define('GUEST_SERVICE_GROUP_SHORT', 'guest-service_groups_short');
}

if (!defined('GUEST_PROJECT')) {
    define('GUEST_PROJECT', 'guest-projects');
}

if (!defined('GUEST_FEEDBACK')) {
    define('GUEST_FEEDBACK', 'guest-feedbacks');
}

if (!defined('GUEST_FAQ')) {
    define('GUEST_FAQ', 'guest-fas');
}
