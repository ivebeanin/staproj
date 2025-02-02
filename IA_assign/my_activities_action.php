<?PHP
//Variables
$action="";
$id="";
$sem = "";
$year = "";
$activities =" ";
$remark = "";

//for upload
$target_dir = "uploads/";
$target_file = "";
$uploadOk = 0;
$imageFileType = "";
$uploadfileName = "";
//for writing to text file
$file="";

//This block is called when button Submit is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //prepare data
    $sem = $_POST["sem"];
    $year = $_POST["year"];
    $activities = trim($_POST["activities"]);
    $location = trim($_POST["location"]);
    $remark = trim($_POST["remark"]);

    // Create or open the text file for appending
    $recordFile = "records.txt";
    $file = fopen($recordFile, "a");

    // Get the current number of records (lines) in the file
    $currentRecords = count(file($recordFile));

    // Generate an ID (row number)
    $id = $currentRecords + 1;          

    //Check if there is an image to be uploaded
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
        $filetmp = $_FILES["fileToUpload"];
        $uploadfileName = $filetmp["name"];
                 
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, image file $uploadfileName already exists.<br>";
            $uploadOk = 0;
        }
        
        // Check file size <= 488.28KB or 500000 bytes
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large. Try resizing your image.<br>";
            $uploadOk = 0;
        }
// Allow only these file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
            $uploadOk = 0;
        }  

        //Check if uploadOk==1 and continue
        if($uploadfileName != "" && $uploadOk == 1){
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //Image file successfully uploaded                    
                   
                //Save all information to record
                //Prepare the record
                $record = "$id | ";
                $record .= "$sem $year | ";
                $record .= "$activities | ";
                $record .= "$location | ";
                $record .= "$remark | ";
                $record .= "$uploadfileName\n";

                //Call saveRecord function
                saveRecord($file, $record);

                //Tell successfull record
                echo "Following is the saved information:<br>$record<br>";
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
                echo "Form data saved successfully!<br>";
                echo '<a href="my_activities.php">Back</a>'; 
            } 
            else{
                //There is an error while uploading image 
                echo "Sorry, there was an error uploading your file.<br>";                
            }
        }
        else{
            echo "Form data is not saved!<br>";
            echo '<a href="my_activities.php">Back</a>';
        }
    } 
    //There is no image to be uploaded so save the record
    else{
        //Prepare the record
        $record = "$id | ";
        $record .= "$sem $year | ";
        $record .= "$activities | ";
        $record .= "$location | ";
        $record .= "$remark |";
        $record .= "\n";

        //call the saveRecord function
        saveRecord($file, $record);

        //Tell successfull writing to file
        echo "Following is the saved information:<br>$record<br>";
        echo "Form data saved successfully!<br>";
        echo '<a href="my_activities.php">Back</a>'; 
    }     
} 
else {
    echo "Invalid request method!";
    echo '<a href="my_activities.php">Back</a>';
}

function saveRecord($file, $record){
    fwrite($file, $record);
    // Close the file
    fclose($file);
}
?>