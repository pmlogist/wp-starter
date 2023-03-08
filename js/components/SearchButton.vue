<template>
  <button id="search-toggle">
    <span class="sr-only">Open main menu</span>
    <i @click="handleOpen" class="ti ti-search 3xl"></i>
  </button>
</template>

<script>
const { ref } = /** @type {import('vue')} */ (Vue);

export default {
  setup() {
    const overlay = document.getElementById("search-overlay");

    const handleOpen = () => {
      if (overlay.dataset.open === "false") {
        document.body.style.overflow = "hidden";
        overlay.dataset.open = true;
        overlay.classList.remove("invisible");
      }
    };

    return { handleOpen };
  },
};
</script>
