<?php
$images = [
    'https://placehold.co/190x80/?text=1',
    'https://placehold.co/190x80/?text=2',
    'https://placehold.co/190x80/?text=3',
    'https://placehold.co/190x80/?text=4',
    'https://placehold.co/190x80/?text=5',
];
?>

<section class="marquee-wrapper">
    <div class="marquee">
        <?php
            // Loop 100 times
            for ($i = 0; $i < 500; $i++) {
                $imageIndex = $i % count($images);
                echo '<img class="marquee-img" src="'.$images[$imageIndex].'" />';
            }
        ?>
    </div>
</section>
