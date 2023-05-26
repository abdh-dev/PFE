<script setup lang="ts">
import AppHead from '@/Components/AppHead.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import ProjectEverything from '@/Sidebar/Components/Project/ProjectEverything.vue'
import AddProjectButton from '@/Sidebar/Components/Project/AddProjectButton.vue'
import AddPhaseModal from '@/Sidebar/Components/Phase/AddPhaseModal.vue'
import AddProjectModal from '@/Project/Components/AddProjectModal.vue'
import ProjectItem from '@/Sidebar/Components/Project/ProjectItem.vue'

import { useProjectStore } from '@/stores/project'
import { ref, watchEffect } from 'vue'
import { storeToRefs } from 'pinia'
import { useWebsocket } from '@/hooks/useWebsocket'
import ProjectContainer from '@/MainContent/Components/Project/ProjectContainer.vue'

const props = defineProps<{
  projects: Project[]
}>()

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

const useProject = useProjectStore()
watchEffect(() => {
  useProject.loadALl(props.projects)
})
const { projects } = storeToRefs(useProject)

useWebsocket(
  'public.projects',
  {
    '.ProjectCreated': (e: SocketEvent) => {
      useProject.push(e.model)
    },
  },
  false
)
</script>

<template>
  <AppHead title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-8">
      <div class="max-w-9xl mx-auto sm:px-2 lg:px-2">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg d-flex">
          <!-- Sidebar -->
          <div class="sidebar-dropdown flex-grow-1">
            <div class="sidebar-search" />
            <div class="sidebar-title">Projects</div>
            <div class="sidebar-content">
              <div class="sidebar-project-list">
                <AddProjectButton
                  @click.prevent="projectModal = !projectModal"
                />
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
          <!-- Main -->
          <div class="projects-container flex-grow-1">
            <ProjectContainer
              v-for="project in projects"
              :key="project.id"
              :project="project"
            />
            <div v-if="projects.length === 0">
              <div class="flex flex-col items-center justify-center h-full">
                <div class="text-2xl font-bold text-gray-500">
                  No projects yet
                </div>
                <div class="text-gray-500">
                  Click the button below to add a project
                </div>
              </div>
            </div>
          </div>
          <!-- Modals -->
          <AddProjectModal :show="projectModal" @close="closeProjectModal" />
          <AddPhaseModal
            :show="phaseModal"
            :project="selectedProject"
            @close="closePhaseModal"
          />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
