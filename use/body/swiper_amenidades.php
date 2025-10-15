<?php 
    $swiperName = 'swiperAmenidades';
    $paginationActiveColor = 'red';
?>
<style>
    [swiper="<?php echo $swiperName; ?>"] {
        
    }
</style>
<div class="swiper-container">
    <div class="swiper no-cut" swiper="<?php echo $swiperName; ?>">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="assets/am-1.png" alt=""></div>
            <div class="swiper-slide"><img src="assets/am-2.png" alt=""></div>
            <div class="swiper-slide"><img src="assets/am-3.png" alt=""></div>
            <div class="swiper-slide"><img src="assets/am-4.png" alt=""></div>
            <div class="swiper-slide"><img src="assets/am-5.png" alt=""></div>
            <div class="swiper-slide"><img src="assets/am-6.png" alt=""></div>
            <div class="swiper-slide"><img src="assets/am-7.png" alt=""></div>
        </div>
    </div>
</div>

<script>
    new Swiper('[swiper="<?php echo $swiperName; ?>"]', {
        slidesPerView: 1.2,
        spaceBetween: 16,
        centeredSlides: true,
        initialSlide: 1,
        breakpoints: {
            1080: {
                slidesPerView: 3,
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