<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings;

class SettingsController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editWebsite()
    {
        $settings = Settings::where('type','website')->get(['key','value'])->toArray();
        // dd($settings);
        $settings_arr = [];
        foreach($settings as $v){
            $settings_arr[$v['key']] = $v['value'];
        }
        // dd($settings_arr['']);
        return view('admin.pages.settings.website',['settings' => $settings_arr]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAccount()
    {
        return view('admin.pages.settings.account');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
    }

    public function updateWebsite(Request $request)
    {
        // dd($request->settings);
        foreach($request->settings as $k => $v){
            // dd($k);
            if(str_contains($k,'site_') && $v != ''){
                // dd($k);
                $item = Settings::where('key',$k)->first();
                if($item){
                    $item->update([
                        'value' => $v
                    ]);
                }else {
                    Settings::create([
                        'key' => $k,
                        'value' => $v,
                        'type' => $request->settings['type']
                    ]);
                }
                return redirect()->back()->with('success','Ustawienia strony zostały zaktualizowane');;
            }
        }
    }

}
