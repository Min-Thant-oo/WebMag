<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteConfigUpdateRequest;
use App\Models\SiteConfig;
use Illuminate\Support\Facades\Storage;

class SiteConfigController extends Controller
{
    public function edit(SiteConfig $siteconfig)
    {
        return view('admin.site-config.edit', [
            'title'     => 'Site Config',
            'id'        => $siteconfig->id,
            'item'      => $siteconfig,
        ]);
    }

    public function update(SiteConfigUpdateRequest $request, SiteConfig $siteconfig)
    {
        $params = $request->validated();

        if($request->hasFile('logo')) {
            if(Storage::disk('public')->exists($siteconfig->logo)) {
                Storage::disk('public')->delete($siteconfig->logo);
            }
            $params['logo'] = $request->file('logo')->store('site');
        } else {
            $params['logo'] = $siteconfig->logo;
        }

        $siteconfig->update($params);

        return to_route('admin.siteconfig.edit', $siteconfig)->with("success", "Successfully Updated");
    }

}
