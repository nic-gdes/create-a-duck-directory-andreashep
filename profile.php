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
    <div class="duck-container">
        <h2>Name of Quacker</h2>
        <div class="duck-profile-image">
            <img src="assets/images/duck1.png" alt="duck1">
        </div>
        <div class="duck-profile-info">
            <h3>Favorite foods</h3>
            <ul class="favorite-foods">
                <li>food</li>
                <li>food</li>
                <li>food</li>
            </ul>
        </div>
        <div class="duck-bio">
            <h3>Quack bio</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus provident laborum enim explicabo modi reiciendis rerum, consequuntur quod omnis soluta! Ipsam dolorum unde fugiat, iure assumenda officia illum deserunt ipsa.</p>
        </div>
    </div>
</main>

<!----------include footer----------->
<?php include 'components/footer.php'; ?>
</body>