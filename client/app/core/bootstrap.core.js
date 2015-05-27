/**
 * 
 * bootstrap.core.js
 * Static Class
 * 
 */
module.exports  =   {
    
    /* Properties */
    
    
    
    test:               'a',
    
    
    /* Public Functions */
    
    /**

    Function bootstrap.init(App);

    **/
    
    init:               function(App, Hooks) {
        
        App.dispatcher   =   'test';
    
        App.conf.application['plugin-path'];
        
    },
    
    
    /**

    Function bootstrap.run();

    **/
    run:                function() {
        
        console.log('Running!');

    },
    
    
    
    
    /* Private Functions */
    
    
    /**

    Function bootstrap.__init_route(App);

    **/
    __init_route:       function() {
    
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
        
    }
    
    
    
    /* Construct Function Start */
    
    
    
    /* Construct Function End */
    
}