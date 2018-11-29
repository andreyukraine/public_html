<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{

    public function index()
    {
        $settings = DB::table('settings')->get()->all();
        return view('admin.settings.index', ['settings' => $settings]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        foreach ($request->all() as $key => $value){
            if ($key != '$value') {
                DB::table('settings')
                    ->where('name', $key)
                    ->update(['value' => $value]);
            }
        }

        $settings = DB::table('settings')->get()->all();
        return view('admin.settings.index', ['settings' => $settings]);
    }

    public function show(Setting $setting)
    {
        //
    }

    public function edit(Setting $setting)
    {
        //
    }

    public function update(Request $request, Setting $setting)
    {
        $settings = DB::table('settings')->get()->all();
        return view('admin.settings.index', ['settings' => $settings]);
    }

    public function destroy(Setting $setting)
    {
        //
    }
}
