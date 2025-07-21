<template>
  <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white dark:bg-gray-800 shadow-md h-full">
      <div class="p-4">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Admin Dashboard</h1>
      </div>
      <nav class="mt-6">
        <ul>
            <li>
                <NuxtLink
                to="/admin"
                class="block px-4 py-2 text-gray-700 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700"
                >
                Dashboard
                </NuxtLink>
            </li>
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
      <slot />
    </main>
  </div>
</template>

<script setup>
import { ref } from "vue";
</script>

<style scoped>
/* Add custom styles if needed */
</style>