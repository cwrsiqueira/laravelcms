<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settings = [];
        $dbsettings = Setting::get();
        foreach ($dbsettings as $dbsetting) {
            $settings[ $dbsetting['name'] ] = $dbsetting['content'];
        }

        return view('admin.settings.index', [
            'settings' => $settings
        ]);
    }

    public function save(Request $request) {

        $data = $request->only([
            'title', 'subtitle', 'email', 'bgcolor', 'textcolor', 'facebook', 'twitter', 'instagram', 'youtube', 'linkedin', 'telefone'
        ]);
        $validator = $this->validator($data);

        if(isset($_FILES['logo']) && !empty($_FILES['logo']['tmp_name'])) {
            $newlogo = $_FILES['logo'];

            if(in_array($newlogo['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
                $logoName = $this->cutImage($newlogo, 500, 500, 'media/images');
                $data['logo'] = $logoName;
            }
        }

        if ($validator->fails()) {
            return redirect()->route('settings')->withErrors($validator);
        }

        foreach ($data as $item => $value) {
            Setting::where('name', $item)->update([
                'content' => $value
            ]);
        }

        return redirect()->route('settings')->with('warning', 'Alterações salvas com sucesso!');
    }

    private function cutImage($file, $w, $h, $folder) {
        list($widthOrig, $heightOrig) = getImageSize($file['tmp_name']);
        $ratio = $widthOrig / $heightOrig;

        $newWidth = $w;
        $newHeight = $newWidth / $ratio;

        if($newHeight < $h) {
            $newHeight = $h;
            $newWidth = $newHeight * $ratio;
        }

        $x = $w - $newWidth;
        $y = $h - $newHeight;
        $x = $x < 0 ? $x / 2 : $x;
        $y = $y < 0 ? $y / 2 : $y;

        $finalImage = imagecreatetruecolor($w, $h);
        switch ($file['type']) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = imagecreatefromjpeg($file['tmp_name']);
                break;
            case 'image/png':
                $image = imagecreatefrompng($file['tmp_name']);
                break;
        }

        imagecopyresampled(
            $finalImage, $image,
            $x, $y, 0, 0,
            $newWidth, $newHeight, $widthOrig, $heightOrig
        );

        $fileName = md5(time().rand(0,9999)).'.jpg';
        $filePath = 'public/'.$folder.'/'.$fileName;

        imagejpeg($finalImage, $filePath);

        return $fileName;
    }

    protected function validator($data) {
        return Validator::make($data, [
            'title' => ['string', 'max:100'],
            'subtitle' => ['string', 'max:100'],
            'bgcolor' => ['string', 'regex:/#[A-Z0-9]{6}/i'],
            'textcolor' => ['string', 'regex:/#[A-Z0-9]{6}/i'],
        ]);
    }
}
