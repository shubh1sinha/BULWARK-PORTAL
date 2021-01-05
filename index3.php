<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style-index3.css">
</head>
<body>


<div class="container-fluid" id="cb">
	<form id="form1">
		<div  class="cb_replyDiv" id="cb_replyDiv">
			
			<input type="text" name="cb_reply" class="cb_reply">
			<input type="submit" name="cb_submit" value="submit">	

		</div>
		<input type="textbox" id="mytextbox" class="qid" />
		<img />


	</form>

	<select id="mydropbox" onchange="copyValue()">
		<option value="Diseases Detection">Diseases Detection</option>
		<option value="Harvesting">Harvesting</option>
		<option value="Soil Analysis">Soil Analysis</option>
		<option value="Reports">Reports</option>
	</select>           



	<script type="text/javascript">
		function copyValue() {
			var dropboxvalue = document.getElementById('mydropbox').value;
			document.getElementById('mytextbox').value = dropboxvalue;
		}
	</script>

</body>
</html>