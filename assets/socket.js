var socket = io.connect('https://www.welovetaxi.com:3443');
var id = detect_user;
    var dataorder = {
        order: parseInt(id),
    };
    console.log(dataorder)
    console.log(id)
socket.on('connect', function(){
  if(id != undefined){
  socket.emit('adduser', dataorder);
}
});

  socket.on('monitor', function(rooms, data) {
    console.log('in case monitor')
     all_data = data;



});