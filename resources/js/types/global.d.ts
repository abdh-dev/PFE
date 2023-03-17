import ziggyRoute from "ziggy-js";
import Echo from "laravel-echo";

declare global {
  const route: typeof ziggyRoute;
  interface Window {
      Echo: Echo;
  }
  const Echo: Echo
}

declare module "@vue/runtime-core" {
  interface ComponentCustomProperties {
    $route: typeof ziggyRoute;
  }
}

declare module "vue/types/vue" {
  interface Vue {
    $route: typeof ziggyRoute;
  }
}
