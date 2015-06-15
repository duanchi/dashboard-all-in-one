var path            =   require('path');

var request         =   {
    url:        window.location.href,
    method:     'GET',
    version:    11,
    headers:     {
        'host': 'localhost'
    },
    data:       null,
    status:     200
}

var app_location    =   path.dirname(window.location.href.split('?', 1)[0].replace(/file:\/\//, ''));

//var App             =   new require(app_location + '/app/app.js')(request, app_location, this);

//App.bootstrap.run();

//console.log(App.dispatcher);

//console.log(JSON.stringify(CONST));

//console.log(JSON.stringify('/monitor/index?129931/lalalala'.match('\/(.*)\/(.*)\\?(\\d+)\/(.*)')));


var msgpack     =   require(app_location + '/app/library/data/msgpack.data.lib.js')();

var json_obj    =   {
    "personal_properties_data": {
        "call_average": "128",
        "call_time_list": {
            "call_distributed_via_time": [
                "1",
                "1",
                "29",
                "104",
                "101",
                "90",
                "42",
                "18"
            ]
        },
        "call_percentage": "0.82",
        "city": "V0310000",
        "duration": "33",
        "effect_time": "20120903",
        "gender": "-1",
        "net_type": "20AAAAAA",
        "netflow_average": "1750.53",
        "netflow_time_list": {
            "netflow_distributed_via_time": [
                "262.59",
                "44.22",
                "688.15",
                "1145.38",
                "692.34",
                "1703.32",
                "555.37",
                "160.21"
            ]
        },
        "netflow_type_list": {
            "netflow_distributed_via_type": [
                "2513.18",
                "13.48",
                "0.0",
                "0.47",
                "158.07"
            ]
        },
        "netflow_percentage": "0.97",
        "province": "31",
        "user": "15618005646"
    },
    "request": {
        "appkey": "550e8400-e29b-41d4-a716-446655440000",
        "id": "04f06426-d0f5-4294-a644-086b2d28badf",
        "service": "cu.datacentre.occasional-service.2015-telecommunication-day.personal-properties"
    },
    "status": {
        "code": "200",
        "message": "OK",
        "timestamp": "1431400633"
    }
};

var time_1  =   process.hrtime();
var time_1  =   (time_1[0] * 1e9 + time_1[1]) / 1e6;
var string  =   JSON.stringify(json_obj);

for (var i = 0; i< 10000; i++) {
    //msgpack.encode(json_obj);
    JSON.parse(string);
}

var time_2  =   process.hrtime();
var time_2  =   (time_2[0] * 1e9 + time_2[1]) / 1e6;
console.log((time_2 - time_1).toString());
//console.log(decode(encode(json_obj)));

