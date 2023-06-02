import ziggyRoute from 'ziggy-js'

declare module 'filepond' {
  export type FilePondType = FilePond
}

declare module '@vue/runtime-core' {
  interface ComponentCustomProperties {
    $route: typeof ziggyRoute
  }
}

declare module 'vue/types/vue' {
  interface Vue {
    $route: typeof ziggyRoute
  }
}
