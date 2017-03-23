<?php ob_start();

$pageTitle = 'Admin Users';
require_once('header.php'); ?>

<h1>Admin Users</h1>

<?php

// access current session
session_start();



try {
    // connect
    require_once('database-connect.php');

    // set up query
    $sql = "SELECT user_id, user_name FROM users ORDER BY user_name";

    // run query and store results
    $cmd = $conn->prepare($sql);
    $cmd->execute();
    $information = $cmd->fetchAll();

    // start table and headings
    echo '<table class="table table-striped table-hover">
    <tr><th>Name</th>';

    if (!empty($_SESSION['user_id'])) {
        echo '<th>Edit</th><th>Delete</th>';
    }

    echo '</tr>';

    // loop through data
    foreach ($information as $info) {

        echo '<tr><td>' . $info['user_name'] . '</td>';

        if (!empty($_SESSION['user_id'])) {
            echo '<td><a href="sign-up.php?user_id=' . $info['user_id'] . '" class="btn btn-primary">Edit</a></td>
            <td><a href="delete-data.php?user_id=' . $info['user_id'] . '"
            class="btn btn-danger confirmation">Delete</a></td>';
        }

        echo '</tr>';
    }

    // end table
    echo '</table>';

    // disconnect
    $conn = null;
}
catch (exception $e) {
    mail('rajvinder.yogi@mygeorgian.ca', 'Information Error', $e);
    header('location:error.php');
}
?>

<?php require_once('footer.php');
ob_flush(); ?>
