<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingUpdateRequest;
use App\Models\profile;
use App\Utils\ImageUploud;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index(){
        return view('profile');
    }


    public function Update(SettingUpdateRequest $request, profile $setting) {
        $setting->update($request->validated());

        if ($request->has('logo')) {
            $logo = ImageUploud::uploudImage($request->file('logo'), 200, 200, 'logo/');
            $setting->update(['logo' => $logo]);
        }
        if ($request->has('favicon')) {
            $favicon = ImageUploud::uploudImage($request->file('favicon'), 32, 32, 'logo/');
            $setting->update(['favicon' => $favicon]);
        }

        return redirect()->route('profile.edit')->with('message', 'Updated Successfully');
    }

    public function edit()
    {
        $setting = Auth::user()->profile;
        return view('profile', compact('setting'));
    }

    public function updateProfile(Request $request, $id)
    {
        // Ensure $id is the profile ID
        $profile = Profile::findOrFail($id);
        $profile->update($request->all());

        // Check user type and redirect accordingly
        if (Auth::user()->type == 'travel-agency') {
            return redirect()->route('dashboard')->with('success', 'Profile updated successfully');
        } else {
            return redirect()->route('index')->with('success', 'Profile updated successfully');
        }
    }

}
