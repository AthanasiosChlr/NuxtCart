<template>
  <div class="max-w-xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">✏️ Επεξεργασία Προϊόντος</h1>

    <form @submit.prevent="updateProduct" class="space-y-4">
      <input
        v-model="form.name"
        type="text"
        placeholder="Όνομα"
        class="w-full border p-2"
        required
      />

      <input
        v-model="form.price"
        type="number"
        step="0.01"
        placeholder="Τιμή (€)"
        class="w-full border p-2"
        required
      />

      <textarea
        v-model="form.description"
        placeholder="Περιγραφή"
        class="w-full border p-2"
      ></textarea>

      <!-- Brand Dropdown -->
      <select v-model="form.brand_id" class="w-full border p-2">
        <option disabled value="">-- Επιλέξτε Brand --</option>
        <option v-for="brand in brands" :key="brand.id" :value="brand.id">
          {{ brand.name }}
        </option>
      </select>

      <!-- Preview Image -->
      <div v-if="previewImage">
        <img :src="previewImage" alt="Preview Image" class="w-32 mb-2" />
      </div>

      <input type="file" @change="handleImage" class="w-full" />

      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
        Αποθήκευση
      </button>
    </form>

    <!-- Return Button -->
    <button
      @click="router.push('/admin/products')"
      class="mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
    >
      Επιστροφή
    </button>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";

const route = useRoute();
const router = useRouter();
const id = route.params.id;

const form = ref({
  name: "",
  price: "",
  description: "",
  image: null,
  brand_id: "",
});

const previewImage = ref(null);
const brands = ref([]);

const fetchProduct = async () => {
  const product = await $fetch(`http://localhost:8000/api/products/${id}`);
  form.value.name = product.name;
  form.value.price = product.price;
  form.value.description = product.description;
  form.value.brand_id = product.brand_id ?? product.brand?.id ?? "";
  previewImage.value = product.image;
};

const fetchBrands = async () => {
  brands.value = await $fetch("http://localhost:8000/api/brands");
};

const handleImage = (e) => {
  const file = e.target.files[0];
  form.value.image = file;
  previewImage.value = URL.createObjectURL(file);
};

const updateProduct = async () => {
  const formData = new FormData();
  formData.append("name", form.value.name);
  formData.append("price", form.value.price);
  formData.append("description", form.value.description);
  formData.append("brand_id", form.value.brand_id);
  if (form.value.image) {
    formData.append("image", form.value.image);
  }

  await $fetch(`http://localhost:8000/api/products/${id}`, {
    method: "POST",
    body: formData,
  });

  router.push("/admin/products");
};

onMounted(() => {
  fetchProduct();
  fetchBrands();
});

definePageMeta({
  layout: "admin",
});
</script>
