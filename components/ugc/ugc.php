<?php 
    $swiperName = 'swiperVideos';
    $youtubeVideosIDs = ['FTQbiNvZqaY', 'FTQbiNvZqaY', 'FTQbiNvZqaY', 'FTQbiNvZqaY']; // Usa los IDs reales
?>

<div class="swiper-container">
    <div class="swiper" swiper="<?php echo $swiperName; ?>">
        <div class="swiper-wrapper">
            <?php foreach ($youtubeVideosIDs as $id): ?>
                <div class="swiper-slide">
                    <div class="video-card" style="background-image: url('https://i.ytimg.com/vi/<?php echo $id; ?>/maxresdefault.jpg');" data-video-id="<?php echo $id; ?>">
                        <button class="play-button"><i class="fas"></i></button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="swiper-btns">
        <button class="swiper-btn fal" swiper-prev="<?php echo $swiperName ?>"></button>
        <button class="swiper-btn fal" swiper-next="<?php echo $swiperName ?>"></button>
    </div>
</div>

<div class="modal modal-video">
    <div class="abs-close-button"></div>
    <div class="video-content">
        <iframe id="modal-video-iframe" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
</div>

<script>
    // Inicia Swiper
    new Swiper('[swiper="<?php echo $swiperName; ?>"]', {
        slidesPerView: 1.3,
        spaceBetween: 16,
        centeredSlides: true,
        initialSlide: 1,
        breakpoints: {
            1080: {
                slidesPerView: 4,
                spaceBetween: 32,
                centeredSlides: false,
                initialSlide: 0,
            }
        },
        navigation: {
            prevEl: '[swiper-prev="<?php echo $swiperName ?>"]',
            nextEl: '[swiper-next="<?php echo $swiperName ?>"]',
        }
    });

    // Reproducción de video
    document.querySelectorAll('.video-card .play-button').forEach(button => {
        button.addEventListener('click', e => {
            const card = button.closest('.video-card');
            const videoId = card.getAttribute('data-video-id');
            const iframe = document.getElementById('modal-video-iframe');
            iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&showinfo=0`;
            document.querySelector('.modal-video').classList.add('show');
        });
    });

    // Cerrar modal
    const modal = document.querySelector('.modal-video');
    const iframe = document.getElementById('modal-video-iframe');

    function closeModal() {
        modal.classList.remove('show');
        iframe.src = ''; // Detiene el video
    }

    document.querySelector('.abs-close-button').addEventListener('click', closeModal);

    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });
</script>
