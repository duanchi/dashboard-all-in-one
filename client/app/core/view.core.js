module.exports  =   function(App) {
    
    this.__instance     =   require(App.location + '/' + App.conf.application.view.engine);
    this.__data         =   {};
    this.__template_file=   '';
    this.__output_buffer=   '';
    
    this.assign         =   function(key, value) {
        this.__data[key]=   value;
    };
    
    this.display        =   function() {
        var template    =   Handlebars.compile(this.__template_file);
        this.__output_buffer    =   template(this.__data);
    };
    
    this.render         =   function() {
        
    };
    
}