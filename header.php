<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>

<nav class="navbar navbar-right">
    <ul class="nav navbar-nav">
        <li><a href="index.php" class="navbar-brand">CMS</a></li>
        <li><a href="information.php">See Profiles</a></li>

        <?php
        session_start();

        if (empty($_SESSION['user_id'])) {

            echo '<li><a href="sign-up.php">Sign Up</a></li>
                <li><a href="sign-in.php">Sign in</a></li>';
        }
        else {

            echo '<li><a href="sign-out.php">Sign Out</a></li>';
        }
        ?>
    </ul>

    <?php
    if (!empty($_SESSION['user_id'])) {
        echo '<div class="navbar-text pull-right">' . $_SESSION['login_name'] . '</div>';
    }

    ?>
</nav>
