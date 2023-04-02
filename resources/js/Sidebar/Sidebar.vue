<script lang="ts" setup>
import AddProjectButton from '@/Sidebar/Components/Project/AddProjectButton.vue'
import PrItemEverything from '@/Sidebar/Components/Project/PrItemEverything.vue'
import AddPhaseModal from '@/Sidebar/Components/Phase/AddPhaseModal.vue'
import AddProjectModal from '@/Project/Components/AddProjectModal.vue'
import ProjectItem from '@/Sidebar/Components/Project/ProjectItem.vue'
import { useWebsocket } from '@/hooks/useWebsocket'

import { ref } from 'vue'

const props = defineProps<{
  projects: Project[]
}>()

const projects = ref<Project[]>(props.projects)
const projectModal = ref(false)
const closeProjectModal = () => {
  projectModal.value = false
}

const phaseModal = ref(false)
const selectedProject = ref<Project | null>(null)
const showPhaseModal = (project: Project) => {
  selectedProject.value = project
  phaseModal.value = true
}

const closePhaseModal = () => {
  phaseModal.value = false
  selectedProject.value = null
}

const projectStore = (e: SocketEvent) => {
  console.log('ProjectCreated', e)
  projects.value.push(e.model)
}

// const projectUpdate = (e: SocketEvent) => {
//     console.log("ProjectUpdated", e);
//     const project: Project = e.model;
//     const updateIndex = props.projects.findIndex(project => project.id == project.id)
//     if (updateIndex !== -1) props.projects[updateIndex] = project;
// }
//
// const projectDelete = (e: SocketEvent) => {
//     console.log("ProjectDeleted", e);
//     const project_: Project = e.model;
//     const deleteIndex = props.projects.findIndex(project => project.id == project_.id)
//     if (deleteIndex !== -1) props.projects.splice(deleteIndex, 1);
// }

useWebsocket(
  'public.projects',
  {
    '.ProjectCreated': projectStore,
    // '.ProjectUpdated': projectUpdate,
    // '.ProjectDeleted': projectDelete,
  },
  false
)
</script>

<template>
  <div class="sidebar-dropdown flex-grow-1">
    <div class="sidebar-search" />
    <div class="sidebar-title">Projects</div>
    <div class="sidebar-content">
      <div class="sidebar-project-list">
        <AddProjectButton @click.prevent="projectModal = !projectModal" />
        <PrItemEverything />

        <ProjectItem
          v-for="project in projects"
          :key="project.id"
          :project="project"
          @show-phase="showPhaseModal"
        />
      </div>
    </div>
  </div>

  <AddProjectModal :show="projectModal" @close="closeProjectModal" />
  <AddPhaseModal
    :show="phaseModal"
    :project="selectedProject"
    @close="closePhaseModal"
  />
</template>
