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

var App             =   new require(app_location + '/app/app.js')(request, app_location, this);

//App.bootstrap.run();

for (key in App.request) {
    console.log(key + ': ' + App.request[key]);
}
//console.log(App.dispatcher);

//console.log(JSON.stringify(CONST));

//console.log(JSON.stringify('/monitor/index?129931/lalalala'.match('\/(.*)\/(.*)\\?(\\d+)\/(.*)')));