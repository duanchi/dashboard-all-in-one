/**

Class Core App;

**/
module.exports  =   function (request, location) {
    
    

    /* Properties */

    //app location
    this.location           =   (location == '' ? '.' : location) + '/app';
    
    this.conf_path          =   this.location + '/conf';

    //app config
    this.conf               =   require(this.conf_path + '/app.conf.json');
    
    this.CONST              =   require(this.conf_path + '/const.conf.json');

    this.Node               =   {};

    //app request
    this.request            =   {
        'version':          CONST.HTTP.VERSION._11,
        'request-uri':      request.url,
        'scheme':           CONST.NET.SCHEME.HTTP,
        'host':             '',
        'socket':           '',
        'path':             '',
        'script-file':      '',
        'query-string':     '',
        'route':            '',
        'method':           CONST.HTTP.METHOD.GET,
        'AUTH':             {},
        'HEADER':           {},
        'COOKIE':           {},
        'SESSION':          {},
        'GET':              {},
        'POST':             {},
        'data':             ''
    };

    
    /* Public Functions */
    
    /**

    Function App.run(request);

    **/
    this.run                =   function() {
        
        console.log('Running!');

    };
    
    
    
    
    /* Private Functions */
    
    this.__init_Node_module =   function() {
        
        if (this.conf['node-module'] != undefined) {
            for (key in this.conf['node-module']) {
                this.Node[this.conf['node-module'][key]]  =   require(this.conf['node-module'][key]);
            }
        }
        
        global.Node         =   this.Node;
    };
    
    this.__init_CONST       =   function() {
        /* Define Global Constants */
        global.CONST        =   this.CONST;
    };
    
    
    this.__init_request     =   function(request) {
        
        var url_object              =   Node.url.parse(request.url);
        var url_scheme              =   url_object.protocol.trim(':').toUpperCase();
        var http_method             =   request.method.toUpperCase();
        var query_obj               =   url_object.query.split('&', 2);
        
        this.request.version        =   request.version;
        this.request.scheme         =   (undefined == CONST.NET.SCHEME[url_scheme] ? CONST.NET.SCHEME.UNKNOW : CONST.NET.SCHEME[url_scheme]);
        this.request.host           =   url_object.host;
        this.request.socket         =   url_object.port;
        this.request.path           =   Node.path.dirname(url_object.pathname);
        this.request['script-file'] =   Node.path.basename(url_object.pathname);
        
        if (query_obj[0].search('=') == -1) {
            this.request.route      =   query_obj.shift();
        }
        
        if ( undefined != query_obj) {
            this.request['query-string']    =   query_obj.shift();
            this.request.GET        =   Node.querystring.parse(this.request['query-string']);
        }
        
        this.request.method         =   (undefined == CONST.HTTP.METHOD[http_method] ? CONST.HTTP.METHOD.GET : CONST.HTTP.METHOD[http_method]);
        
        if (this.request.method == CONST.HTTP.METHOD.POST || this.request.method == CONST.HTTP.METHOD.PUT) {
            this.request.POST       =   Node.querystring.parse(request.data);
        }
        
        this.request.data           =   request.data;
        
    };
    
    
    
    
    /* Construct Function Start */
    
    this.__init_Node_module();
    this.__init_CONST();
    this.__init_request(request);
    
    var Bootstrap                   =   require(this.location + '/' + this.conf.application['bootstrap-file']);
    
    //var mvc_obj             =   Node.url.parse(request.url).query.split('&', 2);

    /* if (mvc_obj[0].search('=') == -1) {
        this.request.GET    =   Node.querystring.parse(mvc_obj[1]);

        mvc_obj             =   mvc_obj[0].split('/', 3);
        switch (mvc_obj.length) {
            case 3: //has m c a

            case 2: //has c a
            this.request.action     =   mvc_obj.pop();                

            case 1: //has c
            this.request.controller =   mvc_obj.pop();

            default:
            if (mvc_obj.length != 0) {
                this.request.module =   mvc_obj.pop();
            }
        }

    }; */
    
    /* Construct Function End */
    
    
    return this;
}