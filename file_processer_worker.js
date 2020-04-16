self.addEventListener('message', function(e){
    
    var sel_file = e;
    console.log("Recieved File: " + sel_file.name);
    
});