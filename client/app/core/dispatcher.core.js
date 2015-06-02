module.exports  =   function(App) {
    
    
    this.get_request    =   function() {
        return App.request;
    };
    
    this.get_config     =   function() {
        return App.conf;  
    };
    
    this.get_route      =   function() {
        return {
            'module':       App.request.module,
            'controller':   App.request.cotroller,
            'action':       App.request.action
            
        }
    };
    
    return this;
}