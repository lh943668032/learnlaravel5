<?php

namespace App\Http\Controllers;

use App\Response\ResponseJson;
use App\SystemVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    use ResponseJson;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        throw new \Exception("我故意的", 1);
        return view('home')->withArticles(\App\Article::all());;
    }

    public function test1(){
        return view('/test');
    }

    public function checkUpdate(Request $request){
        $branch = $request->get('branch');
        $version = $request->get('version');
        $system_version = SystemVersion::where('branch', $branch)->first();
        Log::debug("branch = ".$branch);
        Log::debug("version = ".$version);
        if($system_version){
            $version_data = $system_version->version;
            Log::debug("version_data = ".$version_data);
            if($version_data > $version) {
                Log::debug(">");
                $str_url = "http://nbforfan.oss-cn-shenzhen.aliyuncs.com/";
                $str_version = urlencode($branch."_v".$version_data);
                $url = $str_url.$str_version.".zip";
                return $this->jsonSuccessData(['url' => $url]);
            }else{
                Log::debug("<=");
                return $this->jsonResponse(100,"Already the lastest version","");
            }
        }else{
            Log::debug("version is null");
            return $this->jsonResponse(100,"Already the lastest version","");
        }
    }
}
