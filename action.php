<?php

include "query.php";

$row = [];

// EDIT
if (isset($_GET['edit'])) {
    $id = $_GET['id'];
    $result = getById($id);
    $row = mysqli_fetch_assoc($result);
}

// INSERT
if (isset($_POST['submit'])) {

    $resume = "";

    if (!empty($_FILES['resume']['name'])) {
        $resume = $_FILES['resume']['name'];

        move_uploaded_file(
            $_FILES['resume']['tmp_name'],
            "uploads/" . $resume
        );
    }

    $data = [
        "roll_number" => $_POST['roll_number'] ?? "",
        "first_name" => $_POST['first_name'] ?? "",
        "last_name" => $_POST['last_name'] ?? "",
        "password" => $_POST['password'] ?? "",
        "email" => $_POST['email'] ?? "",
        "address" => $_POST['address'] ?? "",
        "pincode" => $_POST['pincode'] ?? "",
        "course" => isset($_POST['course']) ? implode(",", $_POST['course']) : "",
        "subject" => isset($_POST['subject']) ? implode(",", $_POST['subject']) : "",
        "gender" => $_POST['gender'] ?? "",
        "country" => $_POST['country'] ?? "",
        "resume" => $resume
    ];

    insertData($data);
}

// UPDATE
if (isset($_POST['update'])) {

    $id = $_POST['id'];

    $resume = "";

    if (!empty($_FILES['resume']['name'])) {

        $resume = $_FILES['resume']['name'];

        move_uploaded_file(
            $_FILES['resume']['tmp_name'],
            "uploads/" . $resume
        );

    } else {

        $resume = $row['resume'] ?? '';

    }

    $data = [
        "roll_number" => $_POST['roll_number'] ?? "",
        "first_name" => $_POST['first_name'] ?? "",
        "last_name" => $_POST['last_name'] ?? "",
        "password" => $_POST['password'] ?? "",
        "email" => $_POST['email'] ?? "",
        "address" => $_POST['address'] ?? "",
        "pincode" => $_POST['pincode'] ?? "",
        "course" => isset($_POST['course']) ? implode(",", $_POST['course']) : "",
        "subject" => isset($_POST['subject']) ? implode(",", $_POST['subject']) : "",
        "gender" => $_POST['gender'] ?? "",
        "country" => $_POST['country'] ?? "",
        "resume" => $resume
    ];

    updateData($id, $data);
}

// DELETE
if (isset($_POST['delete'])) {
    deleteData($_POST['id']);
}

?>