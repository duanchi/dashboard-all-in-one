<?php
/**
 * Created by PhpStorm.
 * User: fate
 * Date: 15/8/6
 * Time: 下午3:36
 */

namespace Api;


class TestServer extends \Net\Restful\Server\Handler
{
	public function GET($_service, $_resource, $_parameters, $_properties) {
		return 'hello world';
	}
}