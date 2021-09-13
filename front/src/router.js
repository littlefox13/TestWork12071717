import { createWebHistory, createRouter } from "vue-router";

const routes =  [
  {
    path: "/",
    alias: "/products",
    name: "products",
    component: () => import("./components/ProductsList")
  },
  {
    path: '/edit/:id',
    name: "Edit",
    component: () => import('./components/Edit')
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;