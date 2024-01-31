<?php
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST(['name']));
    $email = htmlspecialchars($_POST(['email']));
    $message = htmlspecialchars($_POST(['message']));

    echo $name . ", " . $email . ", " . $message;
}
?>

<!DOCTYPE html>
<html lang="en">

<!-----------include head----------->
<?php include 'components/head.php'; ?>


<body>
    <!-----------include nav----------->
<?php include 'components/nav.php'; ?>


<main>
<form action="create-duck.php" method="POST">
    <label for="name">Duck Name</label>
    <input type="text" id="name" name="name" required>

    <br>

    <label for="food">Favorite foods</label>
    <input type="text" id="food" name="food" required>

    <br>

<label for="image">Duck Image</label>
<input type="file" id="image" name="image" required>

    <br>

    <label for="bio">Biography</label>
    <textarea id="bio" name="bio" rows="6" required></textarea>

    <br>

    <input type="submit" value="Submit">
</form>

</main>

<!----------include footer----------->
<?php include 'components/footer.php'; ?>
</body>
</html>