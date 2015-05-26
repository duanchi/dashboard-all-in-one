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

App.run();

//console.log(JSON.stringify(CONST));