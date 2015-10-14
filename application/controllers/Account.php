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

    public function rawAction() {

        $this->getResponse()->setHeader( 'Content-Type', 'text/hosts');
        $this->getResponse()->response();

        \IO\FILE::output(\Yaf\Registry::get('config')
                            ->application
                            ->conf
                            ->hosts_path
                        );

        return FALSE;
    }
}