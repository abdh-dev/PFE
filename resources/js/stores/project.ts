import { acceptHMRUpdate, defineStore } from 'pinia'
import { ref } from 'vue'

export const useProjectStore = defineStore('project', () => {
  const projects = ref<Project[]>([])
  const project = ref<Project | null>(null)

  function loadALl(data: Project[]) {
    projects.value = data
  }

  function fetchProject(id: number | null): Project {
    if (!isValidProject(id)) return {} as Project
    return (
      projects.value.find((project) => project.id === id) ?? ({} as Project)
    )
  }

  function pushPhase(idProject: number, ...phases: Phase[]): void {
    const project = fetchProject(idProject)

    project.phases = pushToArray(project.phases, ...phases)
  }

  function pushTask(
    idProject: number,
    idPhase: number,
    ...tasks: Task[]
  ): void {
    const phase = fetchPhase(idProject, idPhase)

    phase.tasks = pushToArray(phase.tasks, ...tasks)
  }

  function pushMedia(
    idProject: number,
    idPhase: number,
    idTask?: number,
    ...media: Media[]
  ): void {
    const item = idTask
      ? fetchTask(idProject, idPhase, idTask)
      : fetchPhase(idProject, idPhase)
    item.media = pushToArray(item.media, ...media)
  }

  function push(...project: Project[]): void {
    projects.value.push(...project)
  }

  // HELPERS

  function isValidProject(id: number | null): boolean {
    return id === null || projects.value.length <= 0
  }

  function fetchPhase(idProject: number, idPhase: number): Phase {
    const project = fetchProject(idProject)
    project.phases = project.phases ?? []

    return project.phases.find((phase) => phase.id === idPhase) ?? ({} as Phase)
  }

  function fetchTask(idProject: number, idPhase: number, idTask: number) {
    const phase = fetchPhase(idProject, idPhase)
    phase.tasks = phase.tasks ?? []

    return phase.tasks.find((task) => task.id === idTask) ?? ({} as Task)
  }

  function pushToArray<T>(array: T[] | null | undefined, ...items: T[]): T[] {
    const newArray = array ?? []
    newArray.push(...items)
    return newArray
  }

  return {
    projects,
    project,
    push,
    loadALl,
    fetchProject,
    pushPhase,
    pushTask,
    pushMedia,
  }
})

if (import.meta.hot) {
  import.meta.hot.accept(acceptHMRUpdate(useProjectStore, import.meta.hot))
}
