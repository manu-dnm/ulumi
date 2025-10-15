<?php 
    $swiperName = 'swiperTest';
    $paginationActiveColor = 'red';
?>
<style>
    [swiper="<?php echo $swiperName; ?>"] {
        
    }
</style>
<div class="swiper-container">
    <div class="swiper" swiper="<?php echo $swiperName; ?>">
        <div class="swiper-wrapper">
            <div class="swiper-slide">item1</div>
            <div class="swiper-slide">item2</div>
            <div class="swiper-slide">item3</div>
            <div class="swiper-slide">item4</div>
            <div class="swiper-slide">item5</div>
        </div>
    </div>
    <div class="swiper-pagination" swiper-pagination="<?php echo $swiperName ?>"></div>
    <div class="swiper-btns">
        <button class="swiper-btn fal" swiper-prev="<?php echo $swiperName ?>"></button>
        <button class="swiper-btn fal" swiper-next="<?php echo $swiperName ?>"></button>
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