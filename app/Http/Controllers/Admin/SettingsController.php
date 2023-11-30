<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }

    public function update(Request $request, Setting $setting)
    {
        $setting->update($request->validate(['color_theme' => 'required']));

        return back()->with(['success' => 'Settings Updated Successfully']);
    }
}