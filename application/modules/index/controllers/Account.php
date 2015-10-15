<?php
/**
 * @name    AccountController
 * @author  duanChi <http://weibo.com/shijingye>
 * @desc    AccountController
 * @see     http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class AccountController extends Yaf\Controller_Abstract {
	
	public function indexAction() {
		$this->forword('login');
		return FALSE;
	}

    public function loginAction() {

    }
}