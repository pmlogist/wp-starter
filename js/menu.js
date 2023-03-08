let scrollpos = window.scrollY;

const header = document.getElementById("primary-menu");
const scrollChange = 5;

const clsx = [
  "bg-white/90",
  "supports-backdrop-blur:bg-white/60",
  "border-slate-900/50",
];
const defaultClsx = ["border-b-transparent"];

const add_class_on_scroll = () => (
  header.classList.remove(...defaultClsx), header.classList.add(...clsx)
);
const remove_class_on_scroll = () => (
  header.classList.remove(...clsx), header.classList.add(...defaultClsx)
);

window.addEventListener("scroll", function () {
  scrollpos = window.scrollY;

  if (scrollpos >= scrollChange) {
    add_class_on_scroll();
  } else {
    remove_class_on_scroll();
  }
});
