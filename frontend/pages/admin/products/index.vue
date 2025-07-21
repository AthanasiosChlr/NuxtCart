<template>
  <div class="min-h-screen bg-gray-100 dark:bg-gray-900 p-8">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">
      Product Management
    </h1>

    <!-- Add Product Button -->
    <div class="mb-6">
      <NuxtLink
        to="/admin/products/add"
        class="text-white bg-green-600 hover:bg-green-700 px-4 py-2 rounded-lg"
      >
        Add Product
      </NuxtLink>
    </div>

    <div
      class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow-md p-6"
    >
      <table class="w-full text-left border-collapse">
        <thead>
          <tr
            class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white"
          >
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Price</th>
            <th class="px-4 py-2">Stock</th>
            <th class="px-4 py-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="product in products"
            :key="product.id"
            class="border-b border-gray-300 dark:border-gray-700"
          >
            <td class="px-4 py-2 text-gray-700 dark:text-gray-300">
              {{ product.name }}
            </td>
            <td class="px-4 py-2 text-gray-700 dark:text-gray-300">
              ${{ product.price }}
            </td>
            <td class="px-4 py-2 text-gray-700 dark:text-gray-300">
              {{ product.stock }}
            </td>
            <td class="px-4 py-2">
              <NuxtLink
                :to="`/admin/products/edit/${product.id}`"
                class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg mr-2"
              >
                Edit
              </NuxtLink>
              <button
                @click="deleteProduct(product.id)"
                class="text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";

const products = ref([]);
const fetchProducts = async () => {
  try {
    const res = await fetch("http://localhost:8000/api/products");
    products.value = await res.json();
  } catch (error) {
    console.error("Error fetching products:", error);
  }
};

const deleteProduct = async (id: number) => {
  try {
    await fetch(`http://localhost:8000/api/products/${id}`, {
      method: "DELETE",
    });
    products.value = products.value.filter((product) => product.id !== id);
  } catch (error) {
    console.error("Error deleting product:", error);
  }
};

onMounted(fetchProducts);

// Specify the layout
definePageMeta({
  layout: "admin",
});
</script>

<style scoped>
table {
  border-spacing: 0;
}
th,
td {
  border-bottom: 1px solid #e5e7eb; /* Tailwind gray-300 */
}
</style>
