import ziggyRoute from 'ziggy-js'

declare module 'filepond' {
  interface FilePond {
    _pond: FilePond
  }

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
