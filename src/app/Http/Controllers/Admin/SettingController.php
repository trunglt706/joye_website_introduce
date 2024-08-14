<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SettingGroup;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    protected $limit_default, $admin, $dir;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->admin = auth('admin')->user();
        $this->dir = 'uploads/setting';
    }

    /**
     * Trang cài đặt
     */
    public function index()
    {
        $type = request('type', 'seo');
        $data = [
            'groups' => SettingGroup::ofStatus(SettingGroup::STATUS_ACTIVE)->orderBy('numering', 'asc')->select('code', 'name', 'icon', 'id')->get(),
            'group' => SettingGroup::with('settings')->ofCode($type)->ofStatus(SettingGroup::STATUS_ACTIVE)->firstOrFail()
        ];
        return view('admin.setting.index', compact('data'));
    }

    /**
     * Hàm cặt nhật giá trị cài đặt
     */
    public function update()
    {
        $data = request()->all();
        try {
            DB::beginTransaction();
            $group = SettingGroup::ofCode($data['type'])->first();
            // get setting of group
            $settings = Setting::groupId($group->id)->get();
            $checkbox = [];
            foreach ($settings as $setting) {
                if (request()->has($setting->code)) {
                    switch ($setting->type) {
                        case Setting::TYPE_FILE:
                            if (request()->hasFile($setting->code)) {
                                $file = request()->file($setting->code);
                                // delete old image
                                delete_file($setting->value);
                                $data['value'] = store_file($file, $this->dir);
                            }
                            break;
                        case Setting::TYPE_IMAGES:
                            if (request()->hasFile($setting->code)) {
                                $old_image = $setting->value ? json_decode($setting->value) : [];
                                $new_image = [];
                                foreach (request()->file($setting->code) as $file) {
                                    array_push($new_image, store_file($file, $this->dir));
                                }
                                $data['value'] = json_encode($new_image);
                                // delete old image
                                foreach ($old_image as $item) {
                                    delete_file($item);
                                }
                            }
                            break;
                        case Setting::TYPE_CHECK_BOX:
                            if (request($setting->code) == 'on') {
                                array_push($checkbox, $setting->id);
                                $data['value'] = 1;
                            }
                            break;
                        default:
                            $data['value'] = trim(request($setting->code));
                            break;
                    }
                    $setting->value = $data['value'];
                    $setting->save();
                }
            }
            Setting::groupId($group->id)->ofType(Setting::TYPE_CHECK_BOX)->whereNotIn('id', $checkbox)->update(['value' => 0]);
            admin_save_log("Danh sách cấu hình thuộc danh mục #$group->name vừa mới được cập nhật");
            DB::commit();
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            DB::rollBack();
            showLog($th);
            return redirect()->back()->with('error', 'Cập nhật thất bại!');
        }
    }
}
