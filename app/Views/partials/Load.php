<?php 
?>
<style>
@keyframes circle-bounce {
  0% {
    top: 60px;
    height: 5px;
    border-radius: 50% 50% 25% 25%;
    transform: scaleX(1.7);
  }

  40% {
    height: 20px;
    border-radius: 50%;
    transform: scaleX(1);
  }

  100% {
    top: 0%;
  }
}

@keyframes shadow-squish {
  0% {
    transform: scaleX(1.5);
  }

  40% {
    transform: scaleX(1);
    opacity: .7;
  }

  100% {
    transform: scaleX(.2);
    opacity: .4;
  }
}

.circle:nth-child(2) {
  animation-delay: .2s;
}

.circle:nth-child(3) {
  animation-delay: .3s;
}

.shadow:nth-child(2) {
  animation-delay: .2s;
}

.shadow:nth-child(3) {
  animation-delay: .3s;
}
</style>

<div id="loading-spinner-wrapper" class="w-full bg-white dark:bg-gray-900 rounded-xl shadow-lg 
                                      flex flex-col items-center justify-center py-16 px-4">
  <div class="relative w-[200px] h-[60px] z-10">
    <div class="circle absolute w-5 h-5 rounded-full bg-mainText left-[15%] transform-gpu origin-center"
      style="animation: circle-bounce 0.5s alternate infinite ease;"></div>
    <div class="circle absolute w-5 h-5 rounded-full bg-mainText left-[45%] transform-gpu origin-center"
      style="animation: circle-bounce 0.5s alternate infinite ease;"></div>
    <div class="circle absolute w-5 h-5 rounded-full bg-mainText right-[15%] transform-gpu origin-center"
      style="animation: circle-bounce 0.5s alternate infinite ease;"></div>

    <div
      class="shadow absolute w-5 h-1 rounded-full bg-gray-800/80 dark:bg-gray-200/50 top-[62px] z-0 left-[15%] blur-sm"
      style="animation: shadow-squish 0.5s alternate infinite ease;"></div>
    <div
      class="shadow absolute w-5 h-1 rounded-full bg-gray-800/80 dark:bg-gray-200/50 top-[62px] z-0 left-[45%] blur-sm"
      style="animation: shadow-squish 0.5s alternate infinite ease;"></div>
    <div
      class="shadow absolute w-5 h-1 rounded-full bg-gray-800/80 dark:bg-gray-200/50 top-[62px] z-0 right-[15%] blur-sm"
      style="animation: shadow-squish 0.5s alternate infinite ease;"></div>
  </div>
  <p class="mt-8 text-lg text-mainText font-medium">Memuat Postingan Meme...</p>
</div>