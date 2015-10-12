<?php
/**
 * File    application\controllers\Router.php
 * Desc    Api路由全流程处理模块
 * Manual  svn://svn.vop.com/api/manual/Controller/Router
 * version 1.1.2
 * User    duanchi <http://weibo.com/shijingye>
 * Date    2013-11-23
 * Time    17:38
 */

/**
 * @name    ApiController
 * @author  duanChi <http://weibo.com/shijingye>
 * @desc    API路由控制器
 * @see     http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class TestController extends Yaf\Controller_Abstract {
	
	public function indexAction($_action = NULL) {
		return $this->$_action();
	}

	public function requestAction() {
		var_dump($this->getRequest());
		return FALSE;
	}

	public function modelAction() {
		$_model_handler = new \Resource\NumberModel();
		var_dump($_model_handler->put());
		return FALSE;
	}

	public function envAction() {
		//new \View(\Registry::get('config')->get('application')->get('view'));
		return FALSE;
	}

	public function restclientAction() {
		$__conf             =   \CONF::get('restful');
		$__client_handle	=	new Net\Restful\Client($__conf);


		$__request			=	new Net\Restful\Client\Request(
			EX_NET_HTTP_METHOD_GET,
			'http://dashboard.devel/test/restserv',
			'18600366232',
			'{{RESOURCE_PLACEHOLDER}}&haha=foo',
			['access_token'=>'8LO2rRDSmwIdbafeicpqAgJC47LXBJ2x5CaOJNpqw32ba6rxwnDNWccQep8HUycW'],
			[],
			'',
			[]
		);
		//$__request
		//	->set('Access-token', '8LO2rRDSmwIdbafeicpqAgJC47LXBJ2x5CaOJNpqw32ba6rxwnDNWccQep8HUycW');
		//	->set('Client-id', '51b08861-84cd-3ca1-a507-5d02907d1d80');


		$__client_handle->add_request($__request);

		//\Callback\Restful\Request::complete();
		t($__client_handle->execute($__request));

		return FALSE;
	}

	public function restservAction()
	{
		$_config = \CONF::get('restful');
		$__handle = new \Api\TestServer();
		$__server = new \Net\Restful\Server($__handle, $_config);
		$__server->handle();

		return FALSE;
	}

	public function curlAction() {


		$__request          =   new Net\Http\Client\Request(EX_NET_HTTP_METHOD_GET, 'http://47.88.136.68');

		$__client_handle	=	new Net\Http\Client();
		$__client           =   $__client_handle->add_request($__request);
		\Devel\Timespent::record('BEFORE');
		$__result           =   $__client_handle->execute();
		\Devel\Timespent::record('RUN');
		t($__result);
		return FALSE;
	}

	public function rpcAction() {
		\CORE\Rpc::add_server(new TestServer(), NULL, 'Yar');
		\CORE\Rpc::handle();
		/*$server = new \CORE\Rpc\PHPRpc\Server();
		$server->add(new TestServer());
		$server->setCharset('UTF-8');
		$server->setDebugMode(FALSE);
		$server->start();
		*/

		return FALSE;
	}

	public function clientAction() {

		$service = [
			[
				['V0001'],
				['order1'],
				['order','targetnum','18618610010'],
			]

		];
		//{{{"V0001"},{"order1"},{"","",""}},{{"V0016"},{"order2"},{"order3","targetnum","18618610010"}}}
		//var_dump($service);
		\CORE\Rpc::add_client(RPC_TEST_PHPRPC_URI, NULL, 'PHPRpc');
		//$_result = \CORE\Rpc::call()->RegisterAccount('17090440005','FFFFFFFFFFFFFFFFFFF', 'FFFFFFFFFFFFFFFFFFFF', 'postpaid', $service, '史景烨', '北京', '010', '130xxxxxxxxxx');

		$_result = \CORE\Rpc::call()->getServiceByUser('5');
		var_dump($_result);
		return FALSE;
	}

	public function etcAction() {
		t(\DATA\Json::get('client'));
		return FALSE;
	}

    public function constant() {
        \CORE\STATUS::APP_NOT_DEFINED('700.1.1');
        return FALSE;
    }

    public function key() {
        $a =  null;
        $start = $this->get_microtime();
        for ($i = 0; $i<1000; $i++) {
            \CORE\KEY::set('test', $i, KEY_STATIC);
            $a = \CORE\KEY::get('test', KEY_STATIC);
        }
        $end = $this->get_microtime();

        var_dump($end - $start);

        $start = $this->get_microtime();
        for ($i = 0; $i<1000; $i++) {
            \Yaf\Registry::set('test', $i);
            $a = \Yaf\Registry::get('test');
        }
        $end = $this->get_microtime();

        var_dump(microtime());
        var_dump($end - $start);
        return FALSE;
    }

    private function get_microtime()
    {
        list($usec, $sec) = explode(' ', microtime());
        return ((float)$usec + (float)$sec);
    }
}
