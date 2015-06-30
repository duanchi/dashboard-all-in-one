module.exports  =   function(App) {
    
    this.__instance =   require(App.location + '/modules/' + App.request.module + '/' + App.request.controller + '.controller.js');
    
    this.run_action =   function(action_name) {
        return eval('this.__instance.___' + action_name + '(App.request.map)');
    }
                    
    this.get_request=   function() {
        return App.request;
    }
    
    
    
    
    
    if (typeof(this.__instance.__init)=="function") {
        this.__instance.__init();
    }
    
    return this;
}