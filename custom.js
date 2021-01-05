$(document).ready(function(){
		
	$(".toggle-btn").click(function(){
		$("nav").toggleClass("active");
		//$(".body").css("background","Red");
	});

      var element = document.getElementsByClassName("custom-container");
      var id = document.querySelector('.custom-container').id;
      console.log("id="+id);
      var MoistureChartdata = {
            labels: [],
            datasets: [
            {
                  label: "Moisture",
                  fill: false,
                  lineTension: 0.3,
                  backgroundColor: "rgba(255, 255, 0, 1)",
                  borderColor: "rgba(0, 50, 255, 1)",
                  pointHoverBackgroundColor: "rgba(255, 0, 128, 1)",
                  pointHoverBorderColor: "rgba(59, 89, 152, 1)",
                  data: [0]
            }]
      }

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

       

      var ctx1 = $("#Moisture-graph");
      var ctx2 = $("#temperature-graph");
      var ctx3 = $("#humidity-graph");

      var MoistureChart = new Chart(ctx1, {
            type: 'line',
            data: MoistureChartdata
      });

      var temperatureChart = new Chart(ctx2, {
            type: 'line',
            data: tempChartdata
      });

      var humidityChart = new Chart(ctx3, {
            type: 'line',
            data: humidChartdata
      });

      

	setInterval(function(){
	
	  	$.ajax({
      
      	     url : "getData.php?id="+id,
      	     type : "GET",
      	
                 success : function(data){
      		//console.log(data);
                  var Moisture=[];
                  var temperature=[];
                  var humidity=[];
                  var timeStamp=[];

                  for(var i in data){

                        Moisture.push(data[i].Moisture);
                        temperature.push(data[i].temperature);
                        humidity.push(data[i].humidity);
                        timeStamp.push((data[i].timeStamp).toString().substr(11,8));
                        //console.log((data[i].timeStamp).toString().substr(11,8));
                  }
                  
                  addData(MoistureChart,temperatureChart,humidityChart,timeStamp,Moisture,temperature,humidity);

      		
	           },
	           error : function(data) {

                  
                  } 
            
            });

		

      },5000);

});

function removeData(MoistureChart,temperatureChart,humidityChart){

      MoistureChart.data.labels.shift();
      MoistureChart.data.datasets[0].data.shift();

      temperatureChart.data.labels.shift();
      temperatureChart.data.datasets[0].data.shift();

      humidityChart.data.labels.shift();
      humidityChart.data.datasets[0].data.shift();

}

function addData(MoistureChart,temperatureChart,humidityChart,label,Moisture,temperature,humidity) {
      if(temperatureChart.data.labels.length>=5)
            removeData(MoistureChart,temperatureChart,humidityChart);
      
      MoistureChart.data.labels.push(label);
      temperatureChart.data.labels.push(label);
      humidityChart.data.labels.push(label);
      
      MoistureChart.data.datasets.forEach((dataset)=>{
            dataset.data.push(Moisture[0]);
      });
      temperatureChart.data.datasets.forEach((dataset) => {
            dataset.data.push(temperature[0]);
            //console.log(dataset.data);
      });

      humidityChart.data.datasets.forEach((dataset) => {
            dataset.data.push(humidity[0]);
            //console.log(dataset.data);
      });
      
      MoistureChart.update();
      temperatureChart.update();
      humidityChart.update();
}
