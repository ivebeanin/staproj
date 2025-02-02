<!DOCTYPE html>
<html>
<head>
    <title>List of Activities</title>
	<!-- Link to the external stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Link to the Google Fonts Raleway -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	
	<script>
	function addToTable(){
	//Get all form values
	var yr = document.forms["myForm"]["year"].value;
	var ac = document.forms["myForm"]["activities"].value;
	var lo = document.forms["myForm"]["location"].value;
	var re = document.forms["myForm"]["remark"].value;
	var table = document.getElementById("projectable");
	
	//Get current number of rows in table by id=projectable
	var numRows = table.rows.length;
	
	//Validate if year, activities, and location are empty
	if(yr == "" || ac == "" || lo == ""){
		alert("Required field must be filled out");
	}
	else{
		//Show confirm box to ask if form values will be 
		//added to the table id=projectable
		if(confirm("Add to table?")==true){
			// Find a <table> element with id="projectable":
var table = document.getElementById("projectable");

// Create an empty <tr> element and add it to the
// 1st position of the table:
			var row = table.insertRow();		

// Insert new cells (<td> elements) at the 1st 
// and 2nd position of the "new" <tr> element:
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);

			// Add values to the new cells:
			cell1.innerHTML = numRows;
			cell2.innerHTML = yr;
			cell3.innerHTML = ac;
			cell4.innerHTML = lo;
			//Remark is optional, so if empty then add white
//space to the cell
			if(re=="") cell5.innerHTML = "&nbsp;";
			else cell5.innerHTML = re;
		}
	}
}

</script>
</head>
<body>

<h2>List of Activities</h2>

<?php include 'menu.php';?>

<table border="1" width="60%" id="projectable">
<style>
#projectable {
font-family: "Raleway", sans-serif;
border-collapse: collapse;
width: 100%;
}
#projectable td, #projectable th {
border: 1px solid #616161;
padding: 8px;
}

#projectable tr:nth-child(even){background-color: #ddd;}
#projectable tr:hover {background-color: #C8B4BA;}

#projectable th {
padding-top: 12px;
padding-bottom: 12px;
text-align: left;
background-color: #4CAF50;
color: black;
}
#projectable td {
padding-top: 12px;
padding-bottom: 12px;
text-align: left;
color: black;
}

nav {
			background-color: #666;
			padding: 10px;
			text-align: center;
		}

		nav a {
			margin: 0 10px;
			color: white;
			text-decoration: none;
		}

		nav b {
			font-size: 18px;
		}
</style>


    <tr>
        <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #619196; color: white;">No</th>
        <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #619196; color: white;">Sem & Year</th>
        <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #619196; color: white;">Name of Activities/Club/Association/Competition</th>
        <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #619196; color: white;">Location</th>
        <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #619196; color: white;">Remarks</th>
		<th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #619196; color: white;">&nbsp;</th>
    </tr>
	<tr id="projectable tr">
		<td id="projectable td">1</td>
		<td id="projectable td">1 2022/2023</td>
		<td id="projectable td">Persatuan Mahasiswa FKI</td>
		<td id="projectable td">UMS</td>
		<td id="projectable td">Committe</td>
		<td>&nbsp;</td>
	</tr>
   
    <tr id="projectable tr">
        <td id="projectable td">2</td>
        <td id="projectable td">1 2022/2023</td>
        <td id="projectable td">Photoshop Workshop</td>
        <td id="projectable td">Library</td>
		<td id="projectable td">Leader</td>
		<td>&nbsp;</td>
        
    </tr>
	
	<?php
        // Read the content of the file
        $filename = "records.txt";
        if (file_exists($filename)) {
            $content = file_get_contents($filename);
            
            if (!empty($content)){
                // Explode the content into an array of records
                $records = explode("\n", $content);

                // Iterate through each record
                foreach ($records as $record) {
                    if (!empty($record)){
                        // Explode each record into an array of fields                    
                        $fields = explode("|", $record);                
                        
                        // Display each field in a table row
                        echo "<tr>";
                        foreach ($fields as $key => $field) {
                            if ($key !== array_key_last($fields)) {
                                echo "<td>$field</td>";
                            }
                        } 
                        $lastField = end($fields);
                        echo '<td><a href="uploads/' . trim($lastField) . '" target="_blank">' . $lastField . '</a></td>';                   
                        echo "</tr>";
                    }
                }
            }  
            else {
                echo '<tr><td colspan="6">No records</td></tr>';
            }            
        }
        else {
            echo '<tr><td colspan="6">No records</td></tr>';
        }            
        ?>
	
	
	
	
</table>
<h3 align="center">Add Activities</h3>
	<p align="center">Required field with mark*</p>

	<form method="POST" action="my_activities_action.php" enctype="multipart/form-data" id="myForm">
		<table border="1" id="myTable">
			<tr>
				<td>Semester*</td>
				<td width="1px">:</td>
				<td>
					<select size="1" name="sem">
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Year*</td>
				<td>:</td>
				<td>
					<input type="text" name="year" size="5" required>
				</td>
			</tr>
			<tr>
				<td>Name of Activities/Club/Association/Competition*</td>
				<td>:</td>
				<td>
					<textarea rows="4" name="activities" cols="21" required></textarea>
				</td>
			</tr>
			<tr>
				<td>Location*</td>
				<td>:</td>
				<td>
					<textarea rows="4" name="location" cols="20" required></textarea>
				</td>
			</tr>
			<tr>
				<td>Remark</td>
				<td>:</td>
				<td>
					<textarea rows="4" name="remark" cols="20"></textarea>
				</td>
			</tr>
			<tr>
				<td>Upload photo</td>
				<td>:</td>
				<td>
                    Max size: 488.28KB<br>
                    <input type="file" name="fileToUpload" id="fileToUpload" accept=".jpg, .jpeg, .png">
				</td>
			</tr>
			<tr>
				<td colspan="3" align="right">
				<input type="button" value="Submit" name="B1" onClick="addToTable();">
				<input type="reset" value="Reset" name="B2">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>