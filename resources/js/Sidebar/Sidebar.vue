<script lang="ts" setup>
import ProjectEverything from '@/Sidebar/Components/Project/ProjectEverything.vue'
import AddProjectButton from '@/Sidebar/Components/Project/AddProjectButton.vue'
import AddPhaseModal from '@/Sidebar/Components/Phase/AddPhaseModal.vue'
import AddProjectModal from '@/Project/Components/AddProjectModal.vue'
import ProjectItem from '@/Sidebar/Components/Project/ProjectItem.vue'

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
</script>

<template>
  <div class="sidebar-dropdown flex-grow-1">
    <div class="sidebar-search" />
    <div class="sidebar-title">Projects</div>
    <div class="sidebar-content">
      <div class="sidebar-project-list">
        <AddProjectButton @click.prevent="projectModal = !projectModal" />
        <ProjectEverything />

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
