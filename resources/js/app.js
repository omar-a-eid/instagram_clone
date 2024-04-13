import Swiper from "swiper";
import "swiper/css";
import { Navigation, Pagination } from "swiper/modules";
//import "swiper/css/navigation";
import "swiper/css/pagination";
import "./bootstrap";

window.Swiper = Swiper;
window.Navigation = Navigation;
window.Pagination = Pagination;

import Alpine from "alpinejs";
import { livewire_hot_reload } from "virtual:livewire-hot-reload";
livewire_hot_reload();
window.Alpine = Alpine;
Alpine.plugin(intersect);

Alpine.start();
