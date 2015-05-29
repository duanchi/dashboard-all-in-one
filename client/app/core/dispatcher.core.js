module.exports  =   function(App) {
    
    
    this.get_request    =   function() {
        return App.request;
    };
    
    this.get_config     =   function() {
        return App.conf;  
    };
    
    return this;
}