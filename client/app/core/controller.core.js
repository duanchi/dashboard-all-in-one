module.exports  =   function(App) {
    
    this.__instance =   require(App.location + '/modules/' + App.request.module + '/' + App.request.controller + '.controller.js');
    
    this.run_action =   function(action_name) {
        return this.__instance.{'___' + action_name};
    }
}