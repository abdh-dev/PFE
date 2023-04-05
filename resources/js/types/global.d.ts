import ziggyRoute from 'ziggy-js'
import Echo from 'laravel-echo'

declare global {
  const route: typeof ziggyRoute
  interface Window {
    Echo: Echo
  }
  const Echo: Echo
  const _: typeof import('lodash')
  const Ziggy: typeof import('ziggy-js')
}
//
// declare module 'ziggy-js' {
//   interface Ziggy {
//     namedRoutes: Record<string, string>
//     baseUrl: string
//     baseProtocol: string
//     baseDomain: string
//     basePort: number | null
//     defaultParameters: Record<string, string>
//   }
// }

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
