<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Training Project</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<h2>Add User</h2>
<form method="POST">
    Name: <input type="text" name="name" required>
    Age: <input type="number" name="age" required>
    <button type="submit" name="save">Save</button>
</form>

<?php
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $conn->query("INSERT INTO users (name, age) VALUES ('$name', '$age')");
}
?>

<h2>Users List</h2>
<table border="1" cellpadding="10">
<tr>
    <th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th>
</tr>
<?php
$res = $conn->query("SELECT * FROM users");
while($row = $res->fetch_assoc()){
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['age']}</td>
        <td>{$row['status']}</td>
        <td><a href='toggle.php?id={$row['id']}'>Toggle</a></td>
    </tr>";
}
?>
</table>
</body>
</html>
