var path        =   require('path');

var request     =   {
    url:        window.location.href,
    method:     'GET',
    version:    '1.1',
    headers:     {
        'host': 'localhost'
    },
    status:     200,
    location:   path.dirname(window.location.href.split('?', 1)[0].replace(/file:\/\//, ''))
}

//Node            =   require(request.location + '/app/conf/node-module.conf.js');



App             =   require(request.location + '/app/app.js');

App.run(request);