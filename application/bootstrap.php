<?php
/**
 * @name Bootstrap
 * @author duanChi <http://weibo.com/shijingye>
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf\Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf\Bootstrap_Abstract{

    public function _initConfig() {

        \CONF::set_environment(\Yaf\Application::app()->environ(), APPLICATION_KEY);
        $__config               = \CONF::get('application');
		Yaf\Registry::set('config', $__config);

	}

    public function _initAutoload() {

        \Yaf\Loader::getInstance()->registerLocalNamespace(explode(',', \CONF::get('application.local_namespace')));

        spl_autoload_register(function ($class_name) {
            \Yaf\Loader::import(\Yaf\Loader::getInstance()->getLibraryPath(FALSE) . DIRECTORY_SEPARATOR . str_replace('\\', '/', $class_name) . '.php');
        });

    }

	/*public function _initRoute(Yaf\Dispatcher $dispatcher) {
		$dispatcher->getRouter()->addConfig(\CONF::get('application.routes'));
	}*/

    public function _initFunction(Yaf\Dispatcher $dispatcher) {
        //初始化自定义全局函数
        \Load::import('Function', \CONF::get('application.library'));
    }

    public function _initPlugin(Yaf\Dispatcher $dispatcher) {
        //注册插件
        $dispatcher->registerPlugin(new EnvPlugin());
        $dispatcher->registerPlugin(new InitPlugin());
        $dispatcher->registerPlugin(new SecurityPlugin());
        //$dispatcher->registerPlugin(new ViewPlugin());
        $dispatcher->registerPlugin(new DevelPlugin());
    }

    public function _initHooks(Yaf\Dispatcher $dispatcher) {
        //注册Hooks
        //\HooksPlugin::register($dispatcher, \CONF::get('hooks'));
        $dispatcher->registerPlugin(new \Hooks\Api\RequestPlugin());
        //$dispatcher->registerPlugin(new \Hook\AuthenticatePlugin());
        //$dispatcher->registerPlugin(new \Hook\ParseConfigPlugin());
        //$dispatcher->registerPlugin(new \Hook\FetchDataPlugin());
        //$dispatcher->registerPlugin(new \Hook\ExtraDataPlugin());
        //$dispatcher->registerPlugin(new \Hook\ResponsePlugin());
        //$dispatcher->registerPlugin(new \Hook\PostEventPlugin());
    }
}
