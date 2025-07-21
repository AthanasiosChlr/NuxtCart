<template>
  <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white dark:bg-gray-800 shadow-md h-full">
      <div class="p-4">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
          Admin Dashboard
        </h1>
      </div>
      <nav class="mt-6">
        <ul>
          <li>
            <NuxtLink
              to="/admin/products"
              class="block px-4 py-2 text-gray-700 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700"
            >
              Manage Products
            </NuxtLink>
          </li>
          <li>
            <NuxtLink
              to="/admin/orders"
              class="block px-4 py-2 text-gray-700 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700"
            >
              Manage Orders
            </NuxtLink>
          </li>
          <li>
            <NuxtLink
              to="/admin/users"
              class="block px-4 py-2 text-gray-700 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700"
            >
              Manage Users
            </NuxtLink>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-grow p-8">
      <div class="w-full sm:w-full md:w-full lg:max-w-screen-xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">
          Welcome to the Admin Dashboard
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Products Card -->
          <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
              Products
            </h3>
            <p class="text-gray-600 dark:text-gray-300">
              Manage your product inventory.
            </p>
            <NuxtLink
              to="/admin/products"
              class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
            >
              View Products
            </NuxtLink>
          </div>

          <!-- Orders Card -->
          <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
              Orders
            </h3>
            <p class="text-gray-600 dark:text-gray-300">
              Track and manage customer orders.
            </p>
            <NuxtLink
              to="/admin/orders"
              class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
            >
              View Orders
            </NuxtLink>
          </div>

          <!-- Users Card -->
          <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
              Users
            </h3>
            <p class="text-gray-600 dark:text-gray-300">
              Manage registered users.
            </p>
            <NuxtLink
              to="/admin/users"
              class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
            >
              View Users
            </NuxtLink>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref } from "vue";
</script>

<style scoped>
/* Add custom styles if needed */
</style>
