<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="ask-style.css">
	
</head>
<body>
<div class="container-fluid" id="cb">
	<form id="form1">
		<div  class="cb_replyDiv" id="cb_replyDiv">
			
			<input type="text" name="cb_reply" class="cb_reply" style="background:transparent;border:none;color:#fff;font-size:32px;height:80px;width:600px;">
				

		</div>
		<input type="textbox" id="mytextbox" class="qid" style="display:none !important;" />
		


	</form>
	<div style="height:30px;"></div>
	<form method="post" enctype="multipart/form-data" style="color:#fff;">
      <input type="file" name="files[]" multiple />
      <input type="submit" value="Upload File" name="submit" class="btn btn-success" />
    </form>

    <script src="upload.js"></script>
	<div style="height:80px;"></div>
	
	<button id="repo1" class="btn btn-primary" href = "/report/doc.docx">Generate Report</button>
	<!--<select id="mydropbox" onchange="copyValue()">
		<option value="Diseases Detection">Diseases Detection</option>
		<option value="Harvesting">Harvesting</option>
		<option value="Soil Analysis">Soil Analysis</option>
		<option value="Reports">Reports</option>
	</select>  -->         
	
    <script src="upload.js"></script>
</div>

	<script type="text/javascript">
		function copyValue() {
			var dropboxvalue = document.getElementById('mydropbox').value;
			document.getElementById('mytextbox').value = dropboxvalue;
		}
	</script>



</body>
</html>