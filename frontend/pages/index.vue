<template>
  <div>
    <HomePageSlider />

    <!-- Hero Section -->
    <section class="bg-gray-100 dark:bg-gray-800 py-8">
      <div class="max-w-screen-xl mx-auto px-4 text-center">
        <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white mb-6">
          Welcome to NuxtCart
        </h1>
        <p class="text-lg text-gray-600 dark:text-gray-300 mb-8">
          Create your account today and explore the latest smartphones and
          electronic devices at unbeatable prices.
        </p>
        <div class="flex justify-center space-x-4">
          <NuxtLink
            to="/signup"
            class="inline-block bg-blue-600 text-white px-8 py-4 rounded-lg shadow-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800"
          >
            Sign Up
          </NuxtLink>
          <NuxtLink
            to="/signin"
            class="inline-block bg-gray-200 text-gray-900 px-8 py-4 rounded-lg shadow-lg hover:bg-gray-300 focus:ring-4 focus:ring-gray-400 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
          >
            Sign In
          </NuxtLink>
        </div>
      </div>
    </section>

    <!-- Featured Products -->
    <section class="py-16 bg-white pb-8 dark:bg-gray-900">
      <div class="max-w-screen-xl mx-auto px-4">
        <h2 class="text-4xl font-bold text-gray-900 dark:text-white py-8 mb-12 text-center">
          Featured Products
        </h2>
        <div class="grid grid-cols-4 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          <div
            v-for="product in products"
            :key="product.id"
            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700"
          >
            <a :href="`/products/${product.id}`">
              <img
                class="p-8 rounded-t-lg"
                :src="product.image || 'https://via.placeholder.com/300x200'"
                :alt="product.name"
              />
            </a>
            <div class="px-5 pb-5">
              <a :href="`/products/${product.id}`">
                <h5
                  class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"
                >
                  {{ product.name }}
                </h5>
              </a>
              <div class="flex items-center mt-2.5 mb-5">
                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                  <svg
                    v-for="i in 5"
                    :key="i"
                    class="w-4 h-4 text-yellow-300"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 22 20"
                  >
                    <path
                      d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
                    />
                  </svg>
                </div>
                <span
                  class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-sm dark:bg-blue-200 dark:text-blue-800 ms-3"
                >
                  5.0
                </span>
              </div>
              <div class="flex items-center justify-between">
                <span class="text-3xl font-bold text-gray-900 dark:text-white">
                  ${{ product.price }}
                </span>
                <a
                  href="#"
                  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                  Add to cart
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";

const products = ref([]);
const loading = ref(true);
const error = ref<Error | null>(null);

const fetchProducts = async () => {
  loading.value = true;
  try {
    const res = await fetch("http://localhost:8000/api/products");
    products.value = await res.json();
  } catch (err: any) {
    error.value = err;
  } finally {
    loading.value = false;
  }
};

onMounted(fetchProducts);
</script>

<style scoped>
.scrollbar-hide {
  -ms-overflow-style: none;
  scrollbar-width: none;
}
.scrollbar-hide::-webkit-scrollbar {
  display: none;
}
</style>
