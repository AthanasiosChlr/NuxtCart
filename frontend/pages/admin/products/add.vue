<template>
  <div class="max-w-xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">➕ Add Product</h1>

    <form @submit.prevent="addProduct" class="space-y-4">
      <input
        v-model="form.name"
        type="text"
        placeholder="Product Name"
        class="w-full border p-2"
        required
      />
      <input
        v-model="form.price"
        type="number"
        step="0.01"
        placeholder="Price (€)"
        class="w-full border p-2"
        required
      />
      <input
        v-model="form.stock"
        type="number"
        placeholder="Stock"
        class="w-full border p-2"
        required
      />
      <textarea
        v-model="form.description"
        placeholder="Description"
        class="w-full border p-2"
      ></textarea>

      <input type="file" @change="handleImage" class="w-full" />

      <button
        type="submit"
        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700"
      >
        Add Product
      </button>
    </form>

    <!-- Return Button -->
    <button
      @click="router.push('/admin/products')"
      class="mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
    >
      Return to Products
    </button>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();

const form = ref({
  name: "",
  price: "",
  stock: "",
  description: "",
  image: null,
});

const handleImage = (e) => {
  const file = e.target.files[0];
  form.value.image = file;
};

const addProduct = async () => {
  const formData = new FormData();
  formData.append("name", form.value.name);
  formData.append("price", form.value.price);
  formData.append("stock", form.value.stock);
  formData.append("description", form.value.description);
  if (form.value.image) {
    formData.append("image", form.value.image);
  }

  try {
    await fetch("http://localhost:8000/api/products", {
      method: "POST",
      body: formData,
    });
    router.push("/admin/products"); // Redirect to products page after adding
  } catch (error) {
    console.error("Error adding product:", error);
  }
};

// Specify the layout
definePageMeta({
  layout: "admin",
});
</script>

<style scoped>
/* Add custom styles if needed */
</style>
