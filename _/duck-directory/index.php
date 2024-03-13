<?php
// include 'database connection
include('./config/db.php');

//create SQL query
$sql = "SELECT name,favorite_foods,img_src FROM ducks";
//query the db and add the result to a php array
$result = mysqli_query($conn, $sql);
$ducks = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free the result from memory and close sql connectino
mysqli_free_result($result);
mysqli_close($conn);

//print_r($ducks);
// check the array
//echo $ducks[0]['name'];
//foreach ($ducks as $duck) {
   // echo $duck['name'];
//}




?>


<!DOCTYPE html>
<html lang="en">

<!-----------include head----------->
<?php include 'components/head.php'; 
?>

<!----page title------->
<?php $page_title = "Home";
?>

<body>
    <!-----------include nav----------->
    <?php include 'components/nav.php'; ?>


    <!-----------main content----------->
    <main>
        <h1>Welcome</h1>
        <h2>Meet our ducks and add your feathered friend today!
        </h2>

        <section>
            <div class="duck-grid">
                <?php foreach ($ducks as $duck) : ?>

                    <div class="grid-item">
                        <h3><?php echo $duck['name'] ?></h3>
                        <img src=<?php echo $duck['img_src'] ?> alt=<?php echo $duck['name'] ?>>
                        <?php
                        $food_list = explode(",", $duck['favorite_foods']);
                        //print_r($food_list);
                        ?>
                        <ul class="favorite-foods">
                            <?php foreach ($food_list as $food) : ?>
                                <li><?php echo $food ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-----------end of foreach loop----------->
                <?php endforeach; ?>



            </div>
        </section>
    </main>

    <!----------include footer----------->
    <?php include 'components/footer.php'; ?>
</body>

</html>

<!--------------css-irl.info/controlling-leftover-grid-items/-------------->