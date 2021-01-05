$(document).ready(function(){
		
	$(".toggle-btn").click(function(){
		$("nav").toggleClass("active");
		//$(".body").css("background","Red");
	});
      var element=document.getElementsByClassName("custom-container");
      var id=elemnt.id;


      var tempChartdata = {
            labels: [],
            datasets: [
            {
                  label: "temperature",
                  fill: false,
                  lineTension: 0.3,
                  backgroundColor: "rgba(255, 255, 0, 1)",
                  borderColor: "rgba(0, 50, 255, 1)",
                  pointHoverBackgroundColor: "rgba(255, 0, 128, 1)",
                  pointHoverBorderColor: "rgba(59, 89, 152, 1)",
                  data: [0]
            }]
      }

      var humidChartdata = {
            labels: [],
            datasets: [
            {
                  label: "humidity",
                  fill: false,
                  lineTension: 0.3,
                  backgroundColor: "rgba(255, 255, 0, 1)",
                  borderColor: "rgba(0, 50, 255, 1)",
                  pointHoverBackgroundColor: "rgba(255, 0, 128, 1)",
                  pointHoverBorderColor: "rgba(59, 89, 152, 1)",
                  data: [0]
            }]
      }

      var ctx1 = $("#temperature-graph");
      var ctx2 = $("#humidity-graph");

      var temperatureChart = new Chart(ctx1, {
            type: 'line',
            data: tempChartdata
      });

      var humidityChart = new Chart(ctx2, {
            type: 'line',
            data: humidChartdata
      });

	setInterval(function(){
	
	  	$.ajax({
      
      	     url : "getData.php?u_id="+id,
      	     type : "GET",
      	
                 success : function(data){
      		console.log("id="+id);
                  console.log(data);
                  var humidity=[];
                  var temperature=[];
                  var timeStamp=[];

                  for(var i in data){
                        temperature.push(data[i].temperature);
                        humidity.push(data[i].humidity);
                        timeStamp.push((data[i].timeStamp).toString().substr(11,8));
                        //console.log((data[i].timeStamp).toString().substr(11,8));
                  }
                  
                  addData(temperatureChart,humidityChart,timeStamp,temperature,humidity);

      		
	           },
	           error : function(data) {
                        console.log("id="+id);
                  
                  } 
            
            });

		

      },5000);

});

function removeData(temperatureChart,humidityChart){
      temperatureChart.data.labels.shift();
      temperatureChart.data.datasets[0].data.shift();

      humidityChart.data.labels.shift();
      humidityChart.data.datasets[0].data.shift();

}

function addData(temperatureChart,humidityChart,label,temperature,humidity) {
      if(temperatureChart.data.labels.length>=5)
            removeData(temperatureChart,humidityChart);
      
      temperatureChart.data.labels.push(label);
      humidityChart.data.labels.push(label);
      
      temperatureChart.data.datasets.forEach((dataset) => {
            dataset.data.push(temperature[0]);
            //console.log(dataset.data);
      });

      humidityChart.data.datasets.forEach((dataset) => {
            dataset.data.push(humidity[0]);
            //console.log(dataset.data);
      });
      
      temperatureChart.update();
      humidityChart.update();
}
