// @ts-ignore

import ziggyRoute from "@types/ziggy-js";

declare global {
  const route: typeof ziggyRoute;
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
