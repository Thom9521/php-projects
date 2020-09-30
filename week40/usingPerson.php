<html>
<header>
    <title>Persons</title>
    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css" integrity="sha256-ogmFxjqiTMnZhxCqVmcqTvjfe1Y/ec4WaRj/aQPvn+I=" crossorigin="anonymous">

    <!-- Compressed JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/js/foundation.min.js" integrity="sha256-pRF3zifJRA9jXGv++b06qwtSqX1byFQOLjqa2PTEb2o=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="people.css">
</header>
<body>

<?php
require_once("Person.php");
require_once ("Friend.php");
$person1 = new Person("James");

$name = $person1->getName();

$person2 = new Person("...");
$person2->setName("Mike");
$name2 = $person2->getName();


$person3 = new Person("Ben");
$name3 = $person3 ->getName();

$friend1 = new Friend("Alex");
$friendName1 = $friend1->getName();
?>
<div class="people-you-might-know">
    <div class="add-people-header">
        <h6 class="header-title">
            People You Might Know
        </h6>
    </div>
    <div class="row add-people-section">
        <div class="small-12 medium-6 columns about-people">
            <div class="about-people-avatar">
                <img class="avatar-image" src="https://i.imgur.com/UPVxPjb.jpg" alt="Kishore Kumar">
            </div>
            <div class="about-people-author">
                <p class="author-name">
                   <?php echo $name ?>
                </p>
                <p class="author-location">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <?php echo $friend1->getAddress() ?>
                </p>
                <p class="author-mutual">
                    <strong><?php echo $friendName1 ?></strong> is a mutual friend.
                </p>
            </div>
        </div>
        <div class="small-12 medium-6 columns add-friend">
            <div class="add-friend-action">
                <button class="button primary small">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    Add Friend
                </button>
                <button class="button secondary small">
                    <i class="fa fa-user-times" aria-hidden="true"></i>
                    Ignore
                </button>
            </div>
        </div>
    </div>
    <div class="row add-people-section">
        <div class="small-12 medium-6 columns about-people">
            <div class="about-people-avatar">
                <img class="avatar-image" src="https://i.imgur.com/GHeazQ2.jpg" alt="Kishore Kumar">
            </div>
            <div class="about-people-author">
                <p class="author-name">
                    <?php echo $name2 ?>
                </p>
                <p class="author-location">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <?php echo $friend1->getAddress() ?>
                </p>
                <p class="author-mutual">
                    <strong><?php echo $friendName1 ?></strong> is a mutual friend.
                </p>
            </div>
        </div>
        <div class="small-12 medium-6 columns add-friend">
            <div class="add-friend-action">
                <button class="button primary small">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    Add Friend
                </button>
                <button class="button secondary small">
                    <i class="fa fa-user-times" aria-hidden="true"></i>
                    Ignore
                </button>
            </div>
        </div>
    </div>
    <div class="row add-people-section">
        <div class="small-12 medium-6 columns about-people">
            <div class="about-people-avatar">
                <img class="avatar-image" src="https://i.imgur.com/SytPzuC.jpg" alt="Kishore Kumar">
            </div>
            <div class="about-people-author">
                <p class="author-name">
                    <?php echo $name3 ?>
                </p>
                <p class="author-location">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <?php echo $friend1->getAddress() ?>
                </p>
                <p class="author-mutual">
                    <strong><?php echo $friendName1 ?></strong> is a mutual friend.
                </p>
            </div>
        </div>
        <div class="small-12 medium-6 columns add-friend">
            <div class="add-friend-action">
                <button class="button primary small">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    Add Friend
                </button>
                <button class="button secondary small">
                    <i class="fa fa-user-times" aria-hidden="true"></i>
                    Ignore
                </button>
            </div>
        </div>
    </div>
    <div class="view-more-people">
        <p class="view-more-text">
            <a href="#" class="view-more-link">View More..</a>
        </p>
    </div>
</div>


</body>
</html>
