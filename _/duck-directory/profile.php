

<?php 


$duck_is_live = false;
/////March 6 class
 if(isset($_GET['id'])) {
 //assign id variable to the id
    $id = htmlspecialchars($_GET['id']);

//get duck info from the database
        //connect to DB
        require('./config/db.php');

        //create query to sellect the intended duck from the db
        $sql = "SELECT id, name, favorite_foods, bio, img_src, FROM ducks Where id = $id";
        $result = mysqli_query($conn, $sql);

        $duck = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

        //check tif duck has a valid id; 
        if(isset($duck['id'])) {
       //switch on $duck_is_live
            $duck_is_live = true;
            $food_list = explode(",", $duck['favorite_foods']);
        }
 }

?>


<!DOCTYPE html>
<html lang="en">

<!-----------include head----------->
<?php include 'components/head.php'; ?>

<!----page title------->
<?php $page_title = "Duck Profile";
?>

<body>
    <!-----------include nav----------->
    <?php include 'components/nav.php'; ?>


    <!-----------main content----------->
    <main>
        <?php if($duck_is_live) : ?>
        <div class="duck-container">
            <h1><?php echo $duck['name'] ?></h1>
            <div class="profile">
                <div class="profile-image">
                    <img src="<?php echo $duck['img_src']; ?>" alt="duck1">
                </div>
            <div class="about-ducks">
                <div class="duck-foods">
                    <h2>My favorite foods</h2>
                    <ul class="favorite-foods">
                  
                        <?php foreach($food_list as $food) : ?>
                            <li><?php echo $food ?></li>
                        <?php endforeach; ?>

                    </ul>
                </div>
                <div class="duck-bio">
                <h2>Quack bio</h2>
                <p><?php echo $duck['bio'] ?></p>
                </div>
        </div>


        <?php else : ?>
            <div class="no-duck">
                <h1>Sorry, this duck does not exist</h1>
            </div>
        <?php endif; ?>
    
    </main>

    <!----------include footer----------->
    <?php include 'components/footer.php'; ?>
</body>