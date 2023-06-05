import { acceptHMRUpdate, defineStore } from 'pinia'
import type {} from 'vite'
import { Ref, ref } from 'vue'

export const usePhaseStore = defineStore('phase', () => {
  const phases = ref([]) as Ref<Phase[]>
  const phase = ref<Phase | null>(null)

  function loadALl(data: Phase[]) {
    phases.value = data
  }

  function fetchProject(id: number) {
    if (phases.value.length <= 0) return
    phase.value = phases.value.find((phase) => phase.id === id) as Phase
  }

  function push(...phase: Phase[]) {
    phases.value.push(...phase)
  }

  return { phases, phase, push, loadALl, fetchProject }
})

if (import.meta.hot) {
  import.meta.hot.accept(acceptHMRUpdate(usePhaseStore, import.meta.hot))
}
