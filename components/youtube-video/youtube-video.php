<?php
    $VIDEO_THUMBNAIL = 'https://placehold.co/600x400/111/000';
    $YOUTUBE_ID = '2Enb_0-Ev1o';
?>

<div class="youtube-video-wrapper">
    <button class="youtube-video-thumbnail">
        <img src="<?php echo $VIDEO_THUMBNAIL ?>" alt="">
        <div class="play-btn">
            <i class="fas"></i>
        </div>
    </button>
    
    <div class="modal">
        <button class="close-modal abs-close-button"></button>
        <div class="video-modal-content">
            <iframe id="youtube-video" width="100%" height="100%" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
</div>

<script>
    // Get DOM elements
    const videoUrl = 'https://www.youtube.com/embed/<?php echo $YOUTUBE_ID ?>?autoplay=1';
    const videoThumbnail = document.querySelector('.youtube-video-thumbnail');
    const modal = document.querySelector('.modal');
    const closeModalButton = document.querySelector('.close-modal');
    const iframe = document.getElementById('youtube-video'); // Use the correct ID for the iframe

    // Show the modal and start the video when the thumbnail is clicked
    videoThumbnail.addEventListener('click', function () {
        modal.classList.add('show');
        iframe.src = videoUrl; // Set the iframe src correctly
    });

    // Hide the modal and stop the video when the close button is clicked
    closeModalButton.addEventListener('click', function () {
        modal.classList.remove('show');
        iframe.src = ''; // Stop the video by clearing the src
    });

    // Close the modal if clicked outside the modal content
    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.classList.remove('show');
            iframe.src = ''; // Stop the video
        }
    });
</script>