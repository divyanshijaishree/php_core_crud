<?php

include "connection.php";

function getAllData() {
    global $conn;
    return mysqli_query($conn, "SELECT * FROM hospital");
}

function getById($id) {
    global $conn;
    return mysqli_query($conn, "SELECT * FROM hospital WHERE id=$id");
}

function insertData($data) {
    global $conn;

    $sql = "INSERT INTO hospital
    (
        roll_number,
        first_name,
        last_name,
        password,
        email,
        address,
        pincode,
        course,
        subject,
        gender,
        country,
        resume
    )
    VALUES
    (
        '{$data['roll_number']}',
        '{$data['first_name']}',
        '{$data['last_name']}',
        '{$data['password']}',
        '{$data['email']}',
        '{$data['address']}',
        '{$data['pincode']}',
        '{$data['course']}',
        '{$data['subject']}',
        '{$data['gender']}',
        '{$data['country']}',
        '{$data['resume']}'
    )";

    return mysqli_query($conn, $sql);
}

function updateData($id, $data) {
    global $conn;

    $sql = "UPDATE hospital SET

    roll_number = '{$data['roll_number']}',
    first_name = '{$data['first_name']}',
    last_name = '{$data['last_name']}',
    password = '{$data['password']}',
    email = '{$data['email']}',
    address = '{$data['address']}',
    pincode = '{$data['pincode']}',
    course = '{$data['course']}',
    subject = '{$data['subject']}',
    gender = '{$data['gender']}',
    country = '{$data['country']}',
    resume = '{$data['resume']}'

    WHERE id = $id";

    return mysqli_query($conn, $sql);
}

function deleteData($id) {
    global $conn;

    return mysqli_query($conn, "DELETE FROM hospital WHERE id=$id");
}

?>