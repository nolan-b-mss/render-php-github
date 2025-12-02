<?php
$filename = 'count.txt';
$MAGIC_WORD = 'fred';

// Initialize the count variable and check for persistence file
$currentCount = 0; 
if (file_exists($filename)) {
    $fileContent = file_get_contents($filename);
    $currentCount = (int)$fileContent; 
} 

// Initialize the default display message
$checkResult = "<span style='color:red'> Try the magic word 'fred'. Total Successes: $currentCount</span>";

// Check if the form was submitted (POST request)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $myInputText01 = $_POST['myText01'] ?? '';

    // Logic: Check input and update state
    if ($myInputText01 === $MAGIC_WORD) {
        $currentCount++; 
        file_put_contents($filename, $currentCount); 

        // Set the success message using the updated count
        $checkResult = "<b style='color:green'> That's correct! </b> The magic word has been entered $currentCount times.";
    } else {
        // On failure, show the current count
        $checkResult = "<span style='color:red'> Try the magic word 'fred'. Total Successes: $currentCount</span>";
    }
}

// Render the HTML page
?>
<!DOCTYPE html>
<html>
<head>
    <title>t2a27</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h3>t2a27-render-php-nolan</h3>

    <form action="" method="post" >
        <label for="myText01">Enter Text:</label>
        <input type="text" id="myText01" name="myText01" value="">
        <input type="submit" value="Submit">
    </form>
    
    <div style="text-align: center;">
        <?php echo $checkResult; ?>
    </div>

</body>
</html>
