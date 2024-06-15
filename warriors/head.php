<?php
session_start();
if(!isset($_SESSION['useremail'])){
  header('location:index.php');
}
?>
<div class="main">
        <nav>
            <ul>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="warriors.php">Warriors</a></li>
                <!-- <li><a href="other.php">Other</a></li> -->
                <li><a href="suggestion.php">Suggestion</a></li>
                <li><a href="contact.php">Contact us</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <!-- <li><a href="suggestions.php">Suggestion's</a></li> -->
                <li><a href="index.php">Logout</a></li>

            </ul>
        </nav>
    </div>