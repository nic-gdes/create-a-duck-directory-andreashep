<?php

//check for POST request
if (isset($_POST['submit'])) {

    //create error array

    $errors = ["name" => '', "favorite_foods" => '', "img_src" => '', "bio" => ''];

    $name = htmlspecialchars($_POST['name']);
    $favorite_foods =  htmlspecialchars($_POST['favorite_foods']);
    $img_src = $_FILES['img_src']['name'];
    $bio = htmlspecialchars($_POST['bio']);


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


    //handle file upload target directory
    $target_dir = './assets/images/';
    // target upload image file
    $image_file = $target_dir . basename($_FILES['img_src']['name']);
    //get uploaxed file extension so we can test to make sure it's an image
    $image_file_type = strtolower(pathinfo($image_file, PATHINFO_EXTENSION));
    //test image for errors
    if (empty($img_src)) {
        $errors["img_src"] = 'An image is required';
    } else {
        $size_check = @getimagesize($_FILES['img_src']['tmp_name']);
        $file_size = $_FILES['img_src']['size'];
        if (!$size_check) {
            $errors["img_src"] = 'File is not an image';
        } else if ($file_size > 500000) {
            //file size
            $errors["img_src"] = 'File cannot be larger than 500kb';
        } else if (
            $image_file_type != 'jpg'
            && $image_file_type != 'png'
            && $image_file_type != 'jpeg'
            && $image_file_type != 'gif'
            && $image_file_type != 'webp'
        )
        //file type
        {
            $errors["img_src"] = 'Only jpg, jpeg, png, and gif files are allowed';
        } else  if (move_uploaded_file($_FILES['img_src']['tmp_name'], $image_file))
        //check if file already exists
        {
            //file has uploaded successfully
            //echo "The file ". htmlspecialchars( basename( $_FILES["img_src"]["name"])). " has been uploaded.";
        } else {
            $errors["img_src"] = 'There was an error uploading your file';
        }



        if (!array_filter($errors)) {
            //everything is goood - form is valid
            echo 'submitted';


            //  <!------connect to database------>

            require("./config/db.php");

            //build sql query
            $sql = "INSERT INTO ducks(name, favorite_foods, image_file, bio) VALUES('$name', '$favorite_foods', '$image_file', '$bio')";
            //execute query in mysql
            mysqli_query($conn, $sql);

            //load homepage
            header('Location:index.php');
        } else {
            //if there are any errors        
            echo "errors in the form: ";
        }
    }
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
        <form action="./create-duck.php" id="create-duck" method="POST" enctype="multipart/form-data">
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

            <label for="image">Duck Image</label>
            <?php if (isset($errors["img_src"])) : ?>
                <div class="error"><?php echo $errors["img_src"]; ?></div>
            <?php endif; ?>
            <input type="file" id="image" name="img_src" required>

            <br>

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