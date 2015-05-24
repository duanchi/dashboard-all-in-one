var Node  =   {
    net:            require('net'),
    url:            require('url'),
    querystring:    require('querystring')
};
/**

    Class App;

    **/
module.exports  =   {
    /**

    Function App.init(request);

    **/
    init:   function(request) {
    

        //parse url
        this.url                =   request.url;

        var mvc_obj             =   Node.url.parse(url).query.split('&', 2);

        if (mvc_obj[0].search('=') == -1) {
            this.request.GET    =   global.Node.querystring.parse(mvc_obj[1]);

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

        }

        //parse app location
        this.location           =   request.location + '/app';

        //parse config
        this.conf               =   require(this.location + '/conf/app.json');
    },



    /**

    Function App.run(request);

    **/
    run:    function(request, Node) {
        
        console.log(JSON.stringify(Node));

        this.init(request, Node);

    },
    
    Node:       null,
    
    location:   '.',
    
    url:        '',
    
    location:   '',
    
    conf    :   null,
    
    request :   {
        module:     'Index',
        controller: 'Index',
        action:     'index',
        GET:        null,
        POST:       null
    }
    
    
}