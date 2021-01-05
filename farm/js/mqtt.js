 $(document).ready(function(){
	

 var clientId = "smart_room"+Math.random(8);
 client = new Paho.MQTT.Client("guru-cool.com", 9001, clientId);
  //Example client = new Paho.MQTT.Client("m11.cloudmqtt.com", 32903, "web_" + parseInt(Math.random() * 100, 10));

  // set callback handlers
  client.onConnectionLost = onConnectionLost;
  client.onMessageArrived = onMessageArrived;
  
  var options = {
    //useSSL: true,
    userName: "udiyate",
    password: "herbeu",
    onSuccess:onConnect,
    onFailure:doFail
  }

  // connect the client
  client.connect(options);

  // called when the client connects
  function onConnect() {
    // Once a connection has been made, make a subscription and send a message.
    console.log("onConnect");
    client.subscribe("smart_room_status");
    //message = new Paho.MQTT.Message("Hello MQTT");
    //message.destinationName = "/smart_room";
    //client.send(message);
  }

  function doFail(e){
    console.log(e);
  }

  // called when the client loses its connection
  function onConnectionLost(responseObject) {
    if (responseObject.errorCode !== 0) {
      console.log("onConnectionLost:"+responseObject.errorMessage);
    }
  }

  // called when a message arrives
  function onMessageArrived(message) {
    console.log("onMessageArrived:"+message.payloadString);
    var data = message.payloadString;
    var statusData = data.split("#");
    console.log(statusData);
    document.getElementById("dev1").style.background = (parseInt(statusData[0])?"Green":"Red");
    document.getElementById("dev2").style.background = (parseInt(statusData[1])?"Green":"Red");
    document.getElementById("dev3").style.background = (parseInt(statusData[2])?"Green":"Red");
    document.getElementById("dev4").style.background = (parseInt(statusData[3])?"Green":"Red");

    document.getElementById("dev1").style.border = (parseInt(statusData[0])?"1px solid Green":"1px solid Red");
    document.getElementById("dev2").style.border = (parseInt(statusData[1])?"1px solid Green":"1px solid Red");
    document.getElementById("dev3").style.border = (parseInt(statusData[2])?"1px solid Green ":"1px solid Red");
    document.getElementById("dev4").style.border = (parseInt(statusData[3])?"1px solid Green":"1px solid Red");

    document.getElementById("dev1").style.boxShadow = (parseInt(statusData[0])?"0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(0, 200, 0, 0.8)":"0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(250, 0, 0, 0.8)");
    document.getElementById("dev2").style.boxShadow = (parseInt(statusData[1])?"0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(0, 200, 0, 0.8)":"0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(250, 0, 0, 0.8)");
    document.getElementById("dev3").style.boxShadow = (parseInt(statusData[2])?"0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(0, 200, 0, 0.8)":"0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(250, 0, 0, 0.8)");
    document.getElementById("dev4").style.boxShadow = (parseInt(statusData[3])?"0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(0, 200, 0, 0.8)":"0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(250, 0, 0, 0.8)");

 }

 $(".device1-on").click(function(){
 	//console.log("dev1_on clicked");
    $(this).trigger("blur");
    message = new Paho.MQTT.Message("dev1_on");
    message.destinationName = "smart_room";
    client.send(message);

    document.getElementById("dev1").style.background = "Green";
    document.getElementById("dev1").style.border = "1px solid Green";
    document.getElementById("dev1").style.boxShadow = "0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(0, 200, 0, 0.8)";

 });

 $(".device2-on").click(function(){
    $(this).trigger("blur");
    message = new Paho.MQTT.Message("dev2_on");
    message.destinationName = "smart_room";
    client.send(message);

    document.getElementById("dev2").style.background = "Green";
    document.getElementById("dev2").style.border = "1px solid Green";
    document.getElementById("dev2").style.boxShadow = "0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(0, 200, 0, 0.8)";
 });

 $(".device3-on").click(function(){
    $(this).trigger("blur");
    message = new Paho.MQTT.Message("dev3_on");
    message.destinationName = "smart_room";
    client.send(message);

    document.getElementById("dev3").style.background = "Green";
    document.getElementById("dev3").style.border = "1px solid Green";
    document.getElementById("dev3").style.boxShadow = "0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(0, 200, 0, 0.8)";

 });

 $(".device4-on").click(function(){
    $(this).trigger("blur");
    message = new Paho.MQTT.Message("dev4_on");
    message.destinationName = "smart_room";
    client.send(message);

    document.getElementById("dev4").style.background = "Green";
    document.getElementById("dev4").style.border = "1px solid Green";
    document.getElementById("dev4").style.boxShadow = "0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(0, 200, 0, 0.8)";

 });

 $(".device1-off").click(function(){
    $(this).trigger("blur");
    message = new Paho.MQTT.Message("dev1_off");
    message.destinationName = "smart_room";
    client.send(message);
    console.log("Dev 1 off");

    document.getElementById("dev1").style.background = "Red";
    document.getElementById("dev1").style.border = "1px solid Red";
    document.getElementById("dev1").style.boxShadow = "0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(250, 0, 0, 0.8)";

 });

 $(".device2-off").click(function(){
    $(this).trigger("blur");
    message = new Paho.MQTT.Message("dev2_off");
    message.destinationName = "smart_room";
    client.send(message);

    document.getElementById("dev2").style.background = "Red";
    document.getElementById("dev2").style.border = "1px solid Red";
    document.getElementById("dev2").style.boxShadow = "0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(250, 0, 0, 0.8)";

 });

 $(".device3-off").click(function(){
    $(this).trigger("blur");
    message = new Paho.MQTT.Message("dev3_off");
    message.destinationName = "smart_room";
    client.send(message);

    document.getElementById("dev3").style.background = "Red";
    document.getElementById("dev3").style.border = "1px solid Red";
    document.getElementById("dev3").style.boxShadow = "0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(250, 0, 0, 0.8)";

 });

 $(".device4-off").click(function(){
    $(this).trigger("blur");
    message = new Paho.MQTT.Message("dev4_off");
    message.destinationName = "smart_room";
    client.send(message);

    document.getElementById("dev4").style.background = "Red";
    document.getElementById("dev4").style.border = "1px solid Red";
    document.getElementById("dev4").style.boxShadow = "0px 2px 20px rgba(0, 0, 0, 1) inset, 0px 0px 20px rgba(250, 0, 0, 0.8)";

 });



});