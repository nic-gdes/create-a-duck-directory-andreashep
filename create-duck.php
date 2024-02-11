<?php
//check for POST request
if (isset($_POST['submit'])) {
    //create error array
    $errors = array(
        "name" => '',
        "favorite_foods" => '',
        "bio" => ''
    );

    $name = htmlspecialchars($_POST["name"]);
    $favorite_foods =  htmlspecialchars($_POST["favorite_foods"]);
    $bio = htmlspecialchars($_POST["bio"]);




    //check if the name exists
    if (empty($name)) {
        //if the name is empty, throw error
        $errors["name"] = 'A Name is required';
    } else {
        //if it does, check against regex

        if (!preg_match('/^[a-zA-Z\s]+$/i', $name)) {
            //if fails regex, throw error
            $errors["name"] = 'The name has illegal characters';
        }
    }


    //check if favorite foods exists
    if (empty($favorite_foods)) {
        //if the name is empty, throw error
        $errors["favorite_foods"] = 'Your duck is hungry, shame on you';
    } else {
        //if it does, check against regex;
        if (!preg_match('/^[a-z,A-Z\s]+$/i', $favorite_foods)) {

            //if it fails regex, throw incorrect formatting error
            $errors["favorite_foods"] = 'Must be a comma separated list of foods';
        }
    }

    //check if bio is empty
    if (empty($bio)) {
        //if the name is empty, throw error
        $errors["bio"] = 'Your duck has a story to tell, let it speak';
    }

    if (!array_filter($errors)) {
        //if there are any errors
    } else {
        //if there are no errors - form is valid
        // header('Location:index.php');
        //echo 'Form is valid';
        //redirect to index.php       

    }

    print_r($errors);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-----------include head----------->
    <?php include 'components/head.php'; ?>

    <!----page title------->
    <?php $page_title = "Create A Duck";
    ?>
</head>

<body>
    <!-----------include nav----------->
    <?php include 'components/nav.php'; ?>


    <main>
        <form action="./create-duck.php" id="create-duck" method="POST">
            <label for="name">Duck Name</label>


            <input type="text" id="name" name="name" autocomplete="off" required><?php if (isset($errors["name"])) : ?>
                <div class="error"><?php echo $errors["name"]; ?></div>
            <?php endif; ?>

            <br>

            <label for="food">Favorite foods</label>
            <?php if (isset($errors["favorite_foods"])) : ?>
                <div class="error"><?php echo $errors["favorite_foods"]; ?></div>
            <?php endif; ?>
            <input type="text" id="food" name="favorite_foods" required>

            <br>

            <!---<label for="image">Duck Image</label>
<input type="file" id="image" name="image" required>

    <br>
--->
            <label for="bio">Biography</label>
            <textarea id="bio" name="bio" rows="6" placeholder="Tell us about your feathered friend..." required></textarea>

            <br>

            <input type="submit" id="submit" name="submit" value="Submit">
        </form>

    </main>

    <!----------include footer----------->
    <?php include 'components/footer.php'; ?>
</body>

</html>