<?php 
$name = $phone = $email = $comments = '';
$nameErr = $phoneErr = $emailErr = '';

function form_input ($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['name'])) {
        $nameErr = "This is a required field!";
    } else {
        $name = form_input ($_POST['name']);

        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and whitespace allowed!";
        }
    }

    if (empty($_POST['phone'])) {
        $phoneErr = "This is a required field!";
    } else {
        $phone = form_input ($_POST['phone']);

        if (!preg_match($phone, '/^[0-9]{10}+$/')) {
            $phoneErr = "Please enter a valid phone number!";
        }
    }
    
    if (empty($_POST['email'])) {
        $emailErr = "This is a required field!";
    } else {
        $email = form_input ($_POST['email']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Please enter a valid email";
        }
    }
    
    if (empty($_POST['comments'])) {
        $comments = "";
    } else {
        $comments = form_input ($_POST['comments']);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../styles.css"/>
</head>
<body>
    <div class="testDiv">
        <ul class="navBar">
            <li class="navList"><a  class="mainLink" href="./contact.php">Contact</a></li>
            <li class="navList"><a  class="mainLink" href="./investment.html">Investment</a></li>
            <li class="navList"><a class="mainLink" href="./about.html">About</a></li>
            <li class="navList"><a class="mainLink" href="./portfolio.html">Portfolio</a></li>
            <li class="navList"><a href="../index.html" class="mainLink">Home</a></li>
        </ul>
    </div>

    <div class="formField">
        <form class="form" id="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <fieldset>

                <label for="name">Name:<em>*</em></label>
                <input name="name" placeholder="Name" type="text" > <span>*<?php echo $nameErr; ?></span>

                <label for="phone">Phone:<em>*</em></label>
                <input name="phone" placeholder="000-000-0000" type="text" > <span>*<?php echo $phoneErr; ?></span>

                <label for="email">Email:<em>*</em></label>
                <input name="email" placeholder="Youremail@gmail.com" type="text" > <span>*<?php echo $emailErr; ?></span>

                <label for="comments">Comments:</label>
                <textarea name="comments" placeholder="Put all comments, questions, and concerns here" type="text" rows="10" cols="60"></textarea>

                <p>*Required field</p>

                <input type="submit" name="submit" id="name">
            </fieldset>
        </form>
    </div>
    
<script></script>    
</body>
</html>