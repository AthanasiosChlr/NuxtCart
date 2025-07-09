<template>
  <div id="default-carousel" class="relative w-full h-screen overflow-hidden">
    <img
      src="/images/banner1.jpg"
      class="absolute block w-full h-full object-cover"
      alt="Banner"
    />

    <div
      class="relative h-full flex"
      :class="
        transitionEnabled ? 'transition-transform duration-700 ease-in-out' : ''
      "
      :style="{ transform: `translateX(-${activeSlide * 100}%)` }"
    >
      <!-- Slide 1 -->
      <div class="w-full flex-shrink-0 flex items-center justify-center">
        <div class="text-center text-white">
          <h1 class="text-5xl font-bold mb-4">Welcome to NuxtCart</h1>
          <p class="text-lg mb-6">
            Discover the latest smartphones and electronic devices.
          </p>
          <NuxtLink
            to="/products"
            class="bg-blue-600 px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700"
          >
            Shop Now
          </NuxtLink>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="w-full flex-shrink-0 flex items-center justify-center">
        <div class="text-center text-white">
          <h1 class="text-5xl font-bold mb-4">Latest Deals</h1>
          <p class="text-lg mb-6">
            Get the best prices on top electronic devices.
          </p>
          <NuxtLink
            to="/products"
            class="bg-blue-600 px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700"
          >
            Explore Deals
          </NuxtLink>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="w-full flex-shrink-0 flex items-center justify-center">
        <div class="text-center text-white">
          <h1 class="text-5xl font-bold mb-4">Shop the Latest</h1>
          <p class="text-lg mb-6">Find the newest arrivals in electronics.</p>
          <NuxtLink
            to="/products"
            class="bg-blue-600 px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700"
          >
            New Arrivals
          </NuxtLink>
        </div>
      </div>

      <div class="w-full flex-shrink-0 flex items-center justify-center">
        <div class="text-center text-white">
          <h1 class="text-5xl font-bold mb-4">Welcome to NuxtCart</h1>
          <p class="text-lg mb-6">
            Discover the latest smartphones and electronic devices.
          </p>
          <NuxtLink
            to="/products"
            class="bg-blue-600 px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700"
          >
            Shop Now
          </NuxtLink>
        </div>
      </div>
    </div>

    <!-- Slider controls -->
    <button
      type="button"
      class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
      @click="prevSlide"
    >
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white/70"
      >
        <svg
          aria-hidden="true"
          class="w-6 h-6 text-white"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M15 19l-7-7 7-7"
          ></path>
        </svg>
        <span class="sr-only">Previous</span>
      </span>
    </button>
    <button
      type="button"
      class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
      @click="nextSlide"
    >
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white/70"
      >
        <svg
          aria-hidden="true"
          class="w-6 h-6 text-white"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M9 5l7 7-7 7"
          ></path>
        </svg>
        <span class="sr-only">Next</span>
      </span>
    </button>
  </div>
</template>

<script setup>
import { ref, watch } from "vue";

const activeSlide = ref(0);

const totalSlides = 4;

const transitionEnabled = ref(true);

const prevSlide = () => {
  activeSlide.value =
    activeSlide.value === 0 ? totalSlides - 2 : activeSlide.value - 1;
};

const nextSlide = () => {
  activeSlide.value =
    activeSlide.value === totalSlides - 1 ? 1 : activeSlide.value + 1;
};

watch(activeSlide, (newVal) => {
  if (newVal === totalSlides - 1) {
    setTimeout(() => {
      transitionEnabled.value = false; 
      activeSlide.value = 0;
      setTimeout(() => {
        transitionEnabled.value = true;
      }, 50);
    }, 700);
  }
});
</script>

<style scoped>
</style>
