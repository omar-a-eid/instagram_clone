import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";
import "swiper/css";
//import "swiper/css/navigation";
import "swiper/css/pagination";

window.Swiper = Swiper;
window.Navigation = Navigation;
window.Pagination = Pagination;
import "./bootstrap";

import { livewire_hot_reload } from "virtual:livewire-hot-reload";
livewire_hot_reload();
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.plugin(intersect);

Alpine.start();
