import { acceptHMRUpdate, defineStore } from 'pinia'
import { Ref, ref } from 'vue'

export const useProjectStore = defineStore('project', () => {
  const projects = ref([]) as Ref<Project[]>
  const project = ref<Project | null>(null)

  function loadALl(data: Project[]) {
    projects.value = data
  }

  function fetchProject(id: number | null): Project | undefined {
    if (id === null || projects.value.length <= 0) return {} as Project
    return projects.value.find((project) => project.id === id)
  }

  function pushPhase(idProject: number, ...phase: Phase[]): void {
    if (idProject === null || projects.value.length <= 0) return
    fetchProject(idProject)?.phases?.push(...phase)
  }

  function pushTask(idProject: number, idPhase: number, ...task: Task[]): void {
    if (idProject === null || projects.value.length <= 0) return
    const phases = fetchProject(idProject)?.phases?.find(
      (phase) => phase.id === idPhase
    ) as Phase
    if (!phases.tasks) phases.tasks = []
    phases.tasks.push(...task)
  }

  function push(...project: Project[]): void {
    projects.value.push(...project)
  }

  return { projects, project, push, loadALl, fetchProject, pushPhase, pushTask }
})

if (import.meta.hot) {
  import.meta.hot.accept(acceptHMRUpdate(useProjectStore, import.meta.hot))
}
