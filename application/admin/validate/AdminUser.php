<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.hisiphp.com
// +----------------------------------------------------------------------
// | HisiPHP承诺基础框架永久免费开源，您可用于学习和商用，但必须保留软件版权信息。
// +----------------------------------------------------------------------
// | Author: 孙承志 <948534670@qq.com>，开发者QQ群：50304283
// +----------------------------------------------------------------------
namespace app\admin\validate;

use think\Validate;

/**
 * 用户验证器
 * @package app\admin\validate
 */
class AdminUser extends Validate
{
    //定义验证规则
    protected $rule = [
        'id|ID' =>'number|notIn:1',
        'username|用户名' => 'require|alphaNum|unique:admin_user|token',
        'role_id|角色'    => 'requireWith:role_id',
        'email|邮箱'     => 'requireWith:email|email|unique:admin_user',
        'password|密码'  => 'require|length:6,20|confirm',
        'mobile|手机号'   => 'requireWith:mobile|regex:^1\d{10}',
    ];

    //定义验证提示
    protected $message = [
        'id.number' => '非法操作',
        'id.In' => '不可操作超级管理员',
        'username.require' => '请输入用户名',
        'username.token' => '未知错误',
        'role_id.require'  => '请选择角色分组',
        'email.require'    => '邮箱不能为空',
        'email.email'      => '邮箱格式不正确',
        'email.unique'     => '该邮箱已存在',
        'password.require' => '密码不能为空',
        'password.length'  => '密码长度6-20位',
        'mobile.regex'     => '手机号不正确',
    ];

    //定义验证场景
    protected $scene = [
        //更新
        'insert'  =>  ['username', 'email', 'password' => 'length:6,20|confirm', 'mobile', 'role_id'],
        //登录
        'login'  =>  ['username' => 'require|token', 'password' => 'length:6,20'],

        'del'  =>  ['id' => 'array'],

    ];
}
