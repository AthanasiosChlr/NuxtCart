<template>
  <header>
    <nav class="fixed top-0 left-0 w-full z-50 bg-transparent text-white">
      <div
        class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
      >
        <NuxtLink
          to="/"
          class="flex items-center space-x-3 rtl:space-x-reverse"
        >
          <img
            src="https://flowbite.com/docs/images/logo.svg"
            class="h-8"
            alt="Flowbite Logo"
          />
          <span class="self-center text-2xl font-semibold whitespace-nowrap"
            >NuxtCart</span
          >
        </NuxtLink>

        <!-- Hamburger button -->
        <button
          @click="menuOpen = !menuOpen"
          type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
          aria-controls="navbar-search"
          aria-expanded="false"
        >
          <span class="sr-only">Open main menu</span>
          <svg
            class="w-5 h-5"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 17 14"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15"
            />
          </svg>
        </button>

        <!-- Mobile Menu -->
        <div v-show="menuOpen" class="w-full md:hidden">
          <ul
            class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
          >
            <li>
              <NuxtLink
                to="/"
                class="block py-2 px-3 text-white bg-blue-700 rounded-sm"
                aria-current="page"
                >Home</NuxtLink
              >
            </li>
            <li>
              <NuxtLink
                to="/about"
                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white"
                >About</NuxtLink
              >
            </li>
            <li>
              <NuxtLink
                to="/services"
                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white"
                >Services</NuxtLink
              >
            </li>
          </ul>
        </div>

        <!-- Desktop Menu -->
        <div class="md:flex md:w-auto md:order-1 items-center space-x-8">
          <ul class="flex flex-row space-x-8 mt-0 font-medium">
            <li>
              <NuxtLink to="/" class="block py-2 px-3 hover:text-blue-500"
                >Home</NuxtLink
              >
            </li>
            <li>
              <NuxtLink to="/about" class="block py-2 px-3 hover:text-blue-500"
                >About</NuxtLink
              >
            </li>
            <li>
              <NuxtLink
                to="/services"
                class="block py-2 px-3 hover:text-blue-500"
                >Services</NuxtLink
              >
            </li>
          </ul>

          <!-- Search Bar -->
          <div class="hidden md:flex items-center ml-4">
            <input
              type="text"
              placeholder="Search..."
              class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            />
            <button
              type="button"
              class="ml-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800"
            >
              Search
            </button>
          </div>
        </div>
      </div>
    </nav>
  </header>
</template>

<script setup lang="ts">
import { ref } from "vue";
const menuOpen = ref(false);
</script>

<style scoped>
nav {
  background: transparent;
  transition: background-color 0.3s ease;
}
nav.scrolled {
  background: rgba(
    0,
    0,
    0,
    0.8
  );
}
</style>
