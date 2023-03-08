// new Menu();
// new Search();

const vue = /** @type {const} */ Vue;

const { loadModule } = window["vue3-sfc-loader"];

const options = {
  moduleCache: {
    vue,
  },
  async getFile(url) {
    const res = await fetch(url);
    if (!res.ok)
      throw Object.assign(new Error(res.statusText + " " + url), { res });
    return {
      getContentData: (asBinary) => (asBinary ? res.arrayBuffer() : res.text()),
    };
  },
  addStyle(textContent) {
    const style = Object.assign(document.createElement("style"), {
      textContent,
    });
    const ref = document.head.getElementsByTagName("style")[0] || null;
    document.head.insertBefore(style, ref);
  },
};

vue
  .createApp({
    components: {
      "mobile-button": vue.defineAsyncComponent(() =>
        loadModule(WP_STORE.components + "/MobileButton.vue", options)
      ),
    },
    template: "<mobile-button></mobile-button>",
  })
  .mount("#mobile-button");

vue
  .createApp({
    components: {
      "search-button": vue.defineAsyncComponent(() =>
        loadModule(WP_STORE.components + "/SearchButton.vue", options)
      ),
    },
    template: "<search-button></search-button>",
  })
  .mount("#search-button");

vue
  .createApp({
    components: {
      "search-overlay": vue.defineAsyncComponent(() =>
        loadModule(WP_STORE.components + "/SearchOverlay.vue", options)
      ),
    },
    template: "<search-overlay></search-overlay>",
  })
  .mount("#search-overlay");

// vue
//   .createApp({
//     components: {
//       "mobile-overlay": vue.defineAsyncComponent(() =>
//         loadModule(WP_STORE.components + "/MobileOverlay.vue", options)
//       ),
//     },
//     template: "<mobile-overlay></mobile-overlay>",
//   })
//   .mount("#mobile-overlay");

vue
  .createApp({
    components: {
      slider: vue.defineAsyncComponent(() =>
        loadModule(WP_STORE.components + "/Slider.vue", options)
      ),
    },
    template: "<slider></slider>",
  })
  .mount("#slider");
