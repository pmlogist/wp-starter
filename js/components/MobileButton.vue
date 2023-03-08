<template>
  <button id="mobile-toggle">
    <span class="sr-only">Open main menu</span>
    <i @click="handleOpen" class="ti ti-menu 3xl"></i>
  </button>
</template>

<script>
const { ref } = /** @type {import('vue')} */ (Vue);

export default {
  setup() {
    const isOpen = ref(false);

    const handleOpen = () => {
      const mobileMenu = document.getElementById("mobile-overlay");
      isOpen.value = !isOpen.value;

      if (isOpen.value) {
        document.body.style.overflow = "hidden";
        mobileMenu.setAttribute("data-open", "true");
        mobileMenu.classList.remove("invisible");
      } else {
        document.body.style.overflow = "auto";
        mobileMenu.setAttribute("data-open", "false");
        mobileMenu.classList.add("invisible");
      }
    };

    return { isOpen, handleOpen };
  },
};
</script>
