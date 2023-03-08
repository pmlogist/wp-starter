<template>
  <div
    id="search-overlay-bg"
    class="fixed inset-0 bg-slate-900/25 backdrop-blur"
    @click="outsideClick"
  ></div>

  <div class="w-full max-w-lg transform px-4">
    <div id="search-input-container" class="shadow-md">
      <input
        class="block w-full appearance-none py-4 pl-4 pr-12 font-sans text-base text-slate-900 placeholder:text-slate-600"
        :class="
          !items && field
            ? 'rounded-lg border-b border-b-transparent'
            : 'rounded-t-lg border-b border-slate-200'
        "
        ref="field"
        type="text"
        placeholder="Trouvez ce qui vous intéresse..."
        @keyup="handleKeyup"
      />
    </div>

    <!-- Menu -->
    <div
      v-if="items"
      class="flex flex-col max-h-80 flex-no-wrap overflow-y-scroll scrolling-touch rounded-b-lg bg-white"
    >
      <div
        v-for="item in items"
        :key="item.id"
        class="px-2 py-4 hover:bg-blue-50"
      >
        <a :href="item.url">
          <div class="">
            <h2 class="font-semibold text-lg">{{ item.title }}</h2>
          </div>
        </a>
      </div>

      <div v-if="items && !items.length" >
        <div class="text-center py-12" >
          <h2 class="font-semibold text-slate-900">Aucun résultat</h2>
          <p class="mt-2 text-sm leading-6 text-slate-600">
            <i class="ti ti-mood-sad text-4xl"></i>
          </p>
        </div>
      </div>
    </div>
</template>

<script>
const { nextTick, onMounted, ref } = /** @type {import('vue')} */ (Vue);

export default {
  setup() {
    const prev = ref("");
    const items = ref(null);
    const field = ref(null);
    const isLoading = ref(false);
    const timer = ref(0);

    const outsideClick = () => {
      const overlay = document.getElementById("search-overlay");
      document.body.style.overflow = "auto";
      overlay.dataset.open = false;
      overlay.classList.add("invisible");
      items.value = null;
      field.value.value = null;
    };

    const fetcher = async (search) => {
      const queryParam = new URLSearchParams({ search });
      const url = `${WP_STORE.api_url}/search?${queryParam}`;

      try {
        const res = await fetch(url);
        const data = await res.json();
        items.value = data;
      } catch (err) {
        console.error(err);
      }

      isLoading.value = false;
    };

    const handleKeyup = /** @param e {KeyboardEvent} */ async (e) => {
      clearTimeout(timer.value);
      if (e.target.value) {
        if (e.target.value !== prev.value) {
          timer.value = setTimeout(async () => fetcher(e.target.value), 520);
          items.value = null;
          isLoading.value = true;
        }
      } else {
        items.value = null;
        isLoading.value = false;
      }

      prev.value = e.target.value;
    };

    onMounted(() => {
      nextTick(() => {
        field.value.focus();
      });
    });

    return { field, items, isLoading, handleKeyup, outsideClick, prev };
  },
};
</script>
