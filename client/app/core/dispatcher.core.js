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
    
    this.get_view       =   function() {
        return App.view;
    };
    
    this.set_view       =   function(view) {
        this.view.instance  =   view;
    };
    
    this.enable_view    =   function() {
        App.view.enabled    =   true;
    };
    
    this.disable_view   =   function() {
        App.view.enabled    =   false;
    };
    
    this.init_view      =   function() {
        if (App.view.enabled == true) {
            this.set_view(new require(App.location + '/core/view.core.js')(App));
        }
    };
    
    this.get_application=   function() {
        return App;
    };
        
    this.get_instance   =   function() {
        return this;
    };
    
    return this;
}