<?php
	namespace Home\Model;
	use Think\Model;

	/**
	 * User: Ding
	 * Date: 2017/3/31
	 * Time: 15:31
	 */
	class UserModel extends Model
	{
		protected $patchValidate = true;

		protected $_validate = array(
				array('nickname','require','帐号不能为空'),
				array('email','email','邮箱格式不正确',2),
				array('password','require','密码不能为空'),
				array('captcha','require','验证码不能为空'),
				array('pwd','password','两次密码必须统一',0,'confirm'),
			);
	}