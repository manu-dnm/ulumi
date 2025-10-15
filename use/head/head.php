<link rel="icon" type="image/png" href="favicon.png" />

<!-- PIXELS -->
<?php include('pixels.php') ?>
<!-- END OF PIXELS -->

<!-- GOOGLE FONTS -->
<?php include('google_fonts.php') ?>
<!-- END OF GOOGLE FONTS -->

<!-- Swiper.js -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- End of Swiper.js -->


<!-- SCROLL ANIMATIONS -->
<style>[data-animation]{transition:.6s;opacity:0}[data-animation=left]{transform:translate(-50px,0)}[data-animation=right]{transform:translate(50px,0)}[data-animation=top]{transform:translate(0,-50px)}[data-animation=bottom]{transform:translate(0,50px)}[data-animation=scale]{transform:scale(.6)}[data-animation-end]{opacity:1;transform:scale(1) perspective(0) rotateX(0) translate(0,0)}</style>
<script>document.addEventListener("DOMContentLoaded",(()=>{const t=(t,e,n,a,i,o)=>{let r=0;const d=Math.ceil(e/n),u=setInterval((()=>{r+=n,r>=e?(t.textContent=`${i}${e}${o}`,clearInterval(u)):t.textContent=`${i}${Math.floor(r)}${o}`}),a/d)},e=()=>{const e=document.querySelectorAll("[data-animation]");for(let n=0;n<e.length;n++){const a=e[n],i=a.getBoundingClientRect();if(i.top<window.innerHeight&&i.bottom>=0){if(!a.hasAttribute("data-animation-end")&&(a.setAttribute("data-animation-end","true"),"counter"===a.getAttribute("data-animation"))){const e=parseInt(a.getAttribute("data-animation-value"))||0,n=parseInt(a.getAttribute("data-animation-step"))||1,i=parseInt(a.getAttribute("data-animation-counter-speed"))||1e3,o=a.getAttribute("data-animation-prefix")||"",r=a.getAttribute("data-animation-suffix")||"";t(a,e,n,i,o,r)}}else if(a.removeAttribute("data-animation-end"),"counter"===a.getAttribute("data-animation")){const t=a.getAttribute("data-animation-prefix")||"",e=a.getAttribute("data-animation-suffix")||"";a.textContent=`${t}0${e}`}}};window.addEventListener("scroll",e),window.addEventListener("resize",e),setTimeout(e,100)}));</script>

<!-- ANIMATIONEXAMPLES

<element
data-animation="counter" 
data-animation-value="25000" 
data-animation-step="250" 
data-animation-counter-speed="2000"
data-animation-prefix="$ "
data-animation-suffix="%">
> 

-->
<!-- END OF SCROLL ANIMATIONS -->

<!-- PARALLAX -->
<script>document.addEventListener("DOMContentLoaded",function(){let t=()=>{let t=document.querySelectorAll("[parallax]");t.forEach(t=>{let e=t,r=Boolean(e.getAttribute("parallax-top-zero")),a=window.scrollY,l=window.innerHeight,n=e.getBoundingClientRect(),o=n.top,s=parseInt(e.getAttribute("parallax-speed")||"2"),i=e.getAttribute("parallax-direction")||"down";0===a&&r?e.style.transform="translateY(0px)":(e.style.transition="transform 0.2s",e.style.transform=`translateY(${(o-l/2)*(.05*s)*("up"===i?1:-1)}px)`)})};window.addEventListener("scroll",t)});</script>
 <!-- END OF PARALLAX -->

<!-- INT TEL INPUT -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.0/build/css/intlTelInput.css">
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.0/build/js/intlTelInput.min.js"></script>
<!-- END OF INT TEL INPUT -->

<!-- MY STYLES -->
<link rel="stylesheet" href="index.css">
<!-- END OF MY STYLES -->