<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Challenges</title>
	<!-- Link to the external stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Link to the Google Fonts Raleway -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	
		
</head>
<body>

<h2>My Challenges</h2>

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
        <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #619196; color: white;">Challenge</th>
        <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #619196; color: white;">Plan</th>
        <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #619196; color: white;">Remark</th>
		<th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #619196; color: white;">&nbsp;</th>
    </tr>
    <tr id="projectable tr">
        <td id="projectable td">1</td>
        <td id="projectable td">1 2022/2023</td>
        <td id="projectable td">Many assignments to be submitted at the same time</td>
        <td id="projectable td">Do early</td>
        <td>&nbsp;</td>
    </tr>
	
	<?php
$sql = "SELECT * FROM challenge";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
$numrow=1;
while($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>" . $numrow . "</td><td>". $row["sem"] . " " . $row["year"]. "</td><td>" . $row["challenge"] .
"</td><td>" . $row["plan"] . "</td><td>" . $row["remark"] . "</td><td>" . $row["img_path"] . "</td>";
echo '<td> <a href="my_challenges_edit.php?id=' . $row["ch_id"] . '">Edit</a>&nbsp;|&nbsp;';
echo '<a href="my_challenges_delete.php?id=' . $row["ch_id"] . '" onClick="return confirm(\'Delete?\');">Delete</a> </td>';
echo "</tr>" . "\n\t\t";
$numrow++;
}
} else {
echo '<tr><td colspan="6">0 results</td></tr>';
}
mysqli_close($conn);
?>
</table>
    </table>

    
	
	
</table>


	<h3 align="center">Add Challenge and Plan</h3>
	<p align="center">Required field with mark*</p>

	<form method="POST" action="my_challenges_action.php" enctype="multipart/form-data" id="myForm">
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
				<td>Challenge*</td>
				<td>:</td>
				<td>
					<textarea rows="4" name="challenge" cols="21" required></textarea>
				</td>
			</tr>
			<tr>
				<td>Plan*</td>
				<td>:</td>
				<td>
					<textarea rows="4" name="plan" cols="20" required></textarea>
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
				<input type="submit" value="Submit" name="B1">                
				<input type="reset" value="Reset" name="B2">
				</td>
			</tr>
		</table>
	</form>
</div>
</form>
</body>
</html>

