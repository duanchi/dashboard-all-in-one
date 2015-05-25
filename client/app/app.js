/**

    Class App;

    **/
module.exports  =   function (request, location) {
    
    

    /* Properties */
    
    this.url                =   request.url;

    //parse app location
    this.location           =   (location == '' ? '.' : location) + '/app';
    
    this.conf_location      =   this.location + '/conf';

    //parse config
    this.conf               =   require(this.location + '/conf/app.conf.json');

    this.Node               =   null;
    
    this.url                =   request.url;

    this.request            =   {
        module:     'Index',
        controller: 'Index',
        action:     'index',
        GET:        null,
        POST:       null
    };
    
    
    
    /* Functions */
    
    /**

    Function App.run(request);

    **/
    this.run                =   function() {
        
        console.log('hello world!');

    };
    
    this.init_Node_module   =   function() {
        
        global.Node         =   {};
        
        if (this.conf['node-module'] != undefined) {
            for (key in this.conf['node-module']) {
                global.Node[this.conf['node-module'][key]]  =   require(this.conf['node-module'][key]);
            }
        }
        
        this.Node           =   global.Node;
    };
    
    
    
    
    /* Construct Function Start */
    
    this.init_Node_module();
    
    var mvc_obj             =   Node.url.parse(request.url).query.split('&', 2);

    if (mvc_obj[0].search('=') == -1) {
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

    };
    
    return this;
    /* Construct Function End */
    
}