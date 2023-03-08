
  <div id="search-overlay" class="fixed invisible inset-0 z-40  flex items-start justify-center  pt-16 sm:pt-24 overflow-x-hidden" role="dialog" aria-modal="true">
    <div id="search-overlay-bg" class="fixed inset-0 bg-slate-900/25 backdrop-blur"></div>

    <div class="w-full max-w-lg transform px-4">
      <div id="search-input-container" class="relative rounded-lg bg-white shadow-md">
        <span class="absolute inset-y-0 right-0 flex items-center">
          <button id="search-close" class="mr-4 text-xl">
            <i class="ti ti-x"></i>
          </button>
        </span>

        <input autofocus id="search-input" type="text" class="block w-full appearance-none bg-transparent py-4 pl-4 pr-12 font-sans text-base text-slate-900 placeholder:text-slate-600" placeholder="Trouvez ce qui vous intéresse..." />
      </div>

      <div id="search-results" class="bg-slate-50 rounded-b-lg overflow-x-hidden">
        <!-- <ul id="search-results" class="flex flex-col divide-y"></ul> -->

      </div>

    </div>
  </div>
