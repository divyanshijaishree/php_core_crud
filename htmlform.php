<?php include "action.php"; ?>

<!doctype html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
<title>Form</title>
</head>
<body>

<div class="container mt-5">
<div class="row">

<!-- TABLE -->

<div class="table-responsive">

<?php
$result = getAllData();

echo "<table class='table table-bordered'>";
echo "<tr>
<th>ID</th>
<th>Roll</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Address</th>
<th>Pincode</th>
<th>Course</th>
<th>Subject</th>
<th>Gender</th>
<th>Country</th>
<th>Action</th>
<th>Resume</th>
</tr>";

while ($data = mysqli_fetch_assoc($result)) {

echo "<tr>
<td>{$data['id']}</td>
<td>{$data['roll_number']}</td>
<td>{$data['first_name']}</td>
<td>{$data['last_name']}</td>
<td>{$data['email']}</td>
<td>{$data['address']}</td>
<td>{$data['pincode']}</td>
<td>{$data['course']}</td>
<td>{$data['subject']}</td>
<td>{$data['gender']}</td>
<td>{$data['country']}</td>

<td>

<a href='?edit=1&id={$data['id']}' class='btn btn-warning btn-sm'>Edit</a>

<form method='POST' style='display:inline-block;'>
<input type='hidden' name='id' value='{$data['id']}'>
<input type='submit' name='delete' class='btn btn-danger btn-sm' value='Delete'>
</form>

</td>

<td>
<a href='uploads/{$data['resume']}' download>Download</a>
</td>

</tr>";
}

echo "</table>";
?>

</div>
<div class="col-sm-4">

<?php
$subject_array = [];

if (isset($row['subject'])) {
    $subject_array = explode(",", $row['subject']);
}

$course_array = [];

if (isset($row['course'])) {
    $course_array = explode(",", $row['course']);
}
?>

<form method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $row['id'] ?? '' ?>">

<input type="text" name="roll_number" class="form-control mb-2"
placeholder="Roll Number"
value="<?= $row['roll_number'] ?? '' ?>">

<input type="text" name="first_name" class="form-control mb-2"
placeholder="First Name"
value="<?= $row['first_name'] ?? '' ?>">

<input type="text" name="last_name" class="form-control mb-2"
placeholder="Last Name"
value="<?= $row['last_name'] ?? '' ?>">

<input type="password" name="password" class="form-control mb-2"
placeholder="Password">

<input type="email" name="email" class="form-control mb-2"
placeholder="Email"
value="<?= $row['email'] ?? '' ?>">

<input type="text" name="address" class="form-control mb-2"
placeholder="Address"
value="<?= $row['address'] ?? '' ?>">

<input type="text" name="pincode" class="form-control mb-2"
placeholder="Pincode"
value="<?= $row['pincode'] ?? '' ?>">


subject:
<?php
$subjects = ["HTML","network","CSS","c++","PHP"];

foreach ($subjects as $sub) {
?>

<input type="checkbox" name="subject[]" value="<?= $sub ?>"
<?php if (in_array($sub, $subject_array)) echo "checked"; ?>>
<?= $sub ?><br>

<?php } ?>

<br>
course 

<select name="course[]" class="form-control mb-2" multiple>

<option value="HTML" <?= in_array('HTML',$course_array) ? 'selected' : '' ?>>HTML</option>

<option value="CSS" <?= in_array('CSS',$course_array) ? 'selected' : '' ?>>CSS</option>

<option value="PHP" <?= in_array('PHP',$course_array) ? 'selected' : '' ?>>PHP</option>

<option value="Laravel" <?= in_array('Laravel',$course_array) ? 'selected' : '' ?>>Laravel</option>

<option value="JavaScript" <?= in_array('JavaScript',$course_array) ? 'selected' : '' ?>>JavaScript</option>

</select>

<br>


<input type="radio" name="gender" value="male"
<?php if (($row['gender'] ?? '') == "male") echo "checked"; ?>>
Male

<input type="radio" name="gender" value="female"
<?php if (($row['gender'] ?? '') == "female") echo "checked"; ?>>
Female

<br><br>

<select name="country" class="form-control">

<option value="">Select</option>

<option value="uk"
<?= (($row['country'] ?? '') == "uk") ? "selected" : "" ?>>
UK
</option>

<option value="pak"
<?= (($row['country'] ?? '') == "pak") ? "selected" : "" ?>>
Pakistan
</option>

<option value="india"
<?= (($row['country'] ?? '') == "india") ? "selected" : "" ?>>
India
</option>

<option value="china"
<?= (($row['country'] ?? '') == "china") ? "selected" : "" ?>>
China
</option>

</select>

<br>

<input type="file" name="resume" class="form-control mb-2">

<br>

<input type="submit" name="submit" class="btn btn-primary" value="Submit">

<input type="submit" name="update" class="btn btn-success" value="Update">

</form>

</div>

</div>
</div>

</body>
</html>