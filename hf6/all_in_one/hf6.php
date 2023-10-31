<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];

    $errors = array();

    // Validate the "firstName" and "lastName" fields
    if (empty($firstName)) {
        $errors[] = "First name is required.";
    } elseif (!preg_match("/^[a-zA-Z\s-]+$/", $firstName)) {
        $errors[] = "First name contains invalid characters.";
    }

    if (empty($lastName)) {
        $errors[] = "Last name is required.";
    } elseif (!preg_match("/^[a-zA-Z\s-]+$/", $lastName)) {
        $errors[] = "Last name contains invalid characters.";
    }

    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Check if the "terms" checkbox is checked
    if (!isset($_POST["terms"])) {
        $errors[] = "You must accept the terms & conditions.";
    }

    // If there are no errors, display the submitted data
    if (empty($errors)) {
        echo "<p>First Name: $firstName</br>";
        echo "<p>Last Name: $lastName</br>";
        echo "<p>Email: $email</p>";

        // Handle optional fields
        if (isset($_POST["attend"])) {
            echo "<p>Attend: " . implode(", ", $_POST["attend"]) . "</br>";
        }
        if (!empty($_POST["tshirt"]) && $_POST["tshirt"] !== "P") {
            echo "<p>T-Shirt Size: " . $_POST["tshirt"] . "</br>";
        }

        // Process file upload
        if (isset($_FILES["abstract"]) && $_FILES["abstract"]["error"] === UPLOAD_ERR_OK) {
           $fiel_name = $_FILES["abstract"]["name"];
           $temp_file_name = $_FILES["abstract"]["tmp_name"];
           $file_size = $_FILES["abstract"]["size"];
           $file_type = $_FILES["abstract"]["type"];

           $allowed_file_type = ['application/pdf'];

           if (in_array($file_type, $allowed_file_type)) {
              if ($file_size <= 3 * 1024 * 1024) {
                  $upload_directory = 'uploads/';
                  if (!file_exists($upload_directory)) {
                      mkdir($upload_directory, 0644, true);
                  }

                  $file_path = $upload_directory . basename($_FILES["abstract"]["name"]);
                  
                  if (move_uploaded_file($temp_file_name, $file_path)) {
                      echo "<p>File uploaded successfully</br>";
                  } else {
                      echo "<p>File upload failed</br>";
                  }
                } else {
                  echo "<p>File is too large</br>";
                }
            } else {
               echo "<p>Invalid file type</br>";
            }
        } else {
            echo "<p>No file uploaded</br>";
        }
    } else {
        // Display error messages
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>Online conference registration</h3>

<form method="post" action="" enctype="multipart/form-data">
    <label for="fname"> First name:
        <input type="text" name="firstName">
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName">
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email">
    </label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1">Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2">Event2<br>
        <input type="checkbox" name="attend[]" value="Event3">Event2<br>
        <input type="checkbox" name="attend[]" value="Event4">Event3<br>
    </label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract"/>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value="">I agree to terms & conditions.<br>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>

</body>
</html>