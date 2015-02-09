<?php
/**
 * Created by PhpStorm.
 * User: fate
 * Date: 15/2/8
 * Time: 下午10:52
 */

namespace Monitor;


class SmsMonitorModel implements \MonitorModel {

    function __construct() {

    }

    public  function get() {
        //INIT ADS API
        $ads_request        =   new \http\Client\Request(
                                                            "GET",
                                                            "http://msgpack.api.ads.devel/~mon-ntfv2",
                                                            ["Access-Token"=>"ZJU3NQG2SDYdyoTdzCx79PRJ5pZBHe1sQcRP0g7B53ZK3eId"]
                                                        );
        $ads_request->setOptions(["timeout"=>10]);

        $ads_handle         =   new \http\Client;
        $ads_handle
            ->enqueue($ads_request)
            ->send();

        $ads_response       =   $ads_handle->getResponse();

        $_data_handle       =   msgpack_unpack($ads_response->getBody()->serialize());

        t($_data_handle);
    }

    public  function status() {

    }
}