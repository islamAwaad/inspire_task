<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\Settings\SettingRepository;

class SiteSettingController extends Controller
{
    /**
     * 
     * show settings page
     * 
     */
    public function showPage(SettingRepository $settingRepository)
    {
        $setting = $settingRepository->get();
        return view('dashboard.site_setting')->with('setting', $setting);
    }
    /**
     * 
     * update settings 
     * 
     */
    public function updateSettings(Request $request, SettingRepository $settingRepository)
    {
        $setting = $settingRepository->update($request);
        if($setting) {
            session()->flash('msg','Settings Successfully updated!');
        }
        return redirect()->route('admin.setting');
    }
}