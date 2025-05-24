<template>
  <div class="layout-wrapper">
    <AppHeader />
    <main>
      <slot />
    </main>
    <AppFooter />
  </div>
</template>

<style scoped>
.layout-wrapper {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  background-color: #1a202c;
  color: #f7fafc;
}
main {
  flex: 1;
}
</style>
