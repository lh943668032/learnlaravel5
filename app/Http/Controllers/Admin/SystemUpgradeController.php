<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\SystemVersion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemUpgradeController extends Controller
{
    /**
     * 后台管理客户版本界面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin/system/index')->with('versions',SystemVersion::all());
    }

    /**
     * 创建新版本
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin/system/create');
    }

    public function store(Request $request) // Laravel 的依赖注入系统会自动初始化我们需要的 Request 类
    {
        // 数据验证
        $this->validate($request, [
            'branch' => 'required', // 必填、在 articles 表中唯一、最大长度 255
            'version' => 'required|integer:0,1000', // 必填
        ]);

        // 通过 Article Model 插入一条数据进 articles 表
        $version = new SystemVersion(); // 初始化 Article 对象
        $version->branch = $request->get('branch'); // 将 POST 提交过了的 title 字段的值赋给 article 的 title 属性
        $version->version = $request->get('version'); // 同上
        $version->user_id = $request->user()->id; // 获取当前 Auth 系统中注册的用户，并将其 id 赋给 article 的 user_id 属性

        // 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if ($version->save()) {
            return redirect('admin/systems'); // 保存成功，跳转到 文章管理 页
        } else {
            // 保存失败，跳回来路页面，保留用户的输入，并给出提示
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    /**
     * 编辑版本
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        return view('admin/system/edit')->with("version",SystemVersion::find($id));
    }

    /**
     * 更新用户版本
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request){
        // 数据验证
        $this->validate($request, [
            'branch' => 'required|unique:systemversions|max:255', // 必填、在 articles 表中唯一、最大长度 255
            'version' => 'required|integer', // 必填
        ]);

        // 通过 Article Model 插入一条数据进 articles 表
        $version = SystemVersion::find($request->get('id')); // 初始化 Article 对象
        $version->branch = $request->get('branch'); // 将 POST 提交过了的 title 字段的值赋给 article 的 title 属性
        $version->version = $request->get('version'); // 同上
//        $article->user_id = $request->user()->id; // 获取当前 Auth 系统中注册的用户，并将其 id 赋给 article 的 user_id 属性

        // 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if ($version->save()) {
            return redirect('admin/systems'); // 保存成功，跳转到 文章管理 页
        } else {
            // 保存失败，跳回来路页面，保留用户的输入，并给出提示
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    public function getVersions(){
        $versions = SystemVersion::all();
        return json_encode($versions,JSON_UNESCAPED_UNICODE);
    }
}
