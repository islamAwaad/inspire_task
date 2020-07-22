<?php 

namespace App\Http\Repositories\Settings;
use App\Models\SiteSetting;

class SettingRepository {

    /**
     * 
     * get settings
     * 
     */
    public function get()
    {
        $setting = SiteSetting::First();
        return $setting;
    }
    /**
     * 
     * update settings
     * 
     */
    public function update($request)
    {
        $setting = SiteSetting::first();
        if($setting) {
            return $setting->update($request->all());
        }
        return SiteSetting::create($request->all());
    }
}