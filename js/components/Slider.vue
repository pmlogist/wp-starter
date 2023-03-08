<template>
  <div class="mt-4 border-t border-slate-300">
    <h3 class="my-4 font-semibold text-4xl">Derniers articles</h3>
    <div
      v-if="items"
      class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
    >
      <div
        class="flex-none w-2/3 my-4 md:w-1/3 mr-8 md:pb-4 border shadow-md rounded-lg"
        v-for="item in items"
        :key="item.id"
      >
        <a :id="`slide-${item.id}`" :href="item.link" class="space-y-4">
          <div class="aspect-square">
            <img
              class="object-cover shadow-md hover:shadow-xl rounded-t-lg"
              src="https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixqx=3H1AJd0Pae&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
              alt=""
            />
            {{ item.title.rendered }}
          </div>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
const { ref } = /** @type {import('vue')} */ (Vue);

export default {
  setup() {
    const items = ref(null);

    return { items };
  },

  async created() {
    const url = `${WP_STORE.api_url}/posts?per_page=20`;
    await fetch(url)
      .then(async (res) => {
        const data = await res.json();
        this.items = data;
      })
      .catch((error) => {
        return error;
      });
  },
};
</script>
