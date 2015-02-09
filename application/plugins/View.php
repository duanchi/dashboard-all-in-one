<?php
class ViewPlugin extends Yaf\Plugin_Abstract {
	function __construct() {
		
	}
	public function routerStartup(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response) {
		ob_start();
	}
	
	public function routerShutdown(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response) {

		/*\Adapter::getInstance('\View')->assign('_URI', [
			'GUID'			=>	(empty($_GUID) ? '/' : $_GUID),
			'module'		=>	strtolower($request->module),
			'controller'	=>	strtolower($request->controller),
			'action'		=>	strtolower($request->action),
		]);*/
		
	}
	
	public function dispatchLoopStartup(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response) {
		Yaf\Dispatcher::getInstance()->setView(\View::instance());
	}
	
	public function preDispatch(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response) {
		
	}
	
	public function postDispatch(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response) {
	}
	
	public function dispatchLoopShutdown(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response) {

	}
	
	public function preResponse(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response) {
		
	}
}

?>