<?php 
    $swiperName = 'swiperTrayectoria';
    $paginationActiveColor = 'red';
?>
<style>
    [swiper="<?php echo $swiperName; ?>"] {
        
    }
</style>
<div class="swiper-container">
    <div class="swiper no-cut-mobile" swiper="<?php echo $swiperName; ?>">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="assets/tray-1.png" alt=""></div>
            <div class="swiper-slide"><img src="assets/tray-2.png" alt=""></div>
            <div class="swiper-slide"><img src="assets/tray-3.png" alt=""></div>
            <div class="swiper-slide"><img src="assets/tray-4.png" alt=""></div>
        </div>
    </div>
</div>

<script>
    new Swiper('[swiper="<?php echo $swiperName; ?>"]', {
        slidesPerView: 1.9,
        spaceBetween: 0,
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
        },
        pagination: {
            el: '[swiper-pagination="<?php echo $swiperName ?>"]',
        },
    })
</script>