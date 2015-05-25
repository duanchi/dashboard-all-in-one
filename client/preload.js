var path            =   require('path');

var request         =   {
    url:        window.location.href,
    method:     'GET',
    version:    '1.1',
    headers:     {
        'host': 'localhost'
    },
    status:     200
}

var app_location    =   path.dirname(window.location.href.split('?', 1)[0].replace(/file:\/\//, ''));

var App             =   new require(app_location + '/app/app.js')(request, app_location);

App.run();

console.log(App.url);
