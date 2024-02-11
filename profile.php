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
            <h1>Name of Quacker</h1>
            <div class="profile">
                <div class="profile-image">
                    <img src="assets/images/duck1.png" alt="duck1">
                </div>
                <div class="about-ducks">
                <div class="duck-foods">
                    <h2>My favorite foods</h2>
                    <ul class="favorite-foods">
                        <li>food</li>
                        <li>food</li>
                        <li>food</li>
                    </ul>
                </div>
                <div class="duck-bio">
                <h2>Quack bio</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus provident laborum enim explicabo modi reiciendis rerum, consequuntur quod omnis soluta! Ipsam dolorum unde fugiat, iure assumenda officia illum deserunt ipsa.</p>
            </div>
                </div>
            </div>
            
        </div>
    </main>

    <!----------include footer----------->
    <?php include 'components/footer.php'; ?>
</body>