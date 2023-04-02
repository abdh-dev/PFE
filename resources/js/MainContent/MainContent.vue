<script setup lang="ts">
import ProjectContainer from '@/MainContent/Components/Project/ProjectContainer.vue'

import { useWebsocket } from '@/hooks/useWebsocket'
import { ref } from 'vue'

const props = defineProps<{
  projects: Project[]
}>()

const projects = ref<Project[]>(props.projects)

useWebsocket(
  'public.projects',
  {
    '.ProjectCreated': (e: SocketEvent) => {
      console.log('ProjectCreated', e)
      projects.value.push(e.model)
    },
  },
  false
)
</script>

<template>
  <div class="projects-container flex-grow-1">
    <ProjectContainer
      v-for="project in projects"
      :key="project.id"
      :project="project"
    />

    <div v-if="projects.length === 0">
      <div class="flex flex-col items-center justify-center h-full">
        <div class="text-2xl font-bold text-gray-500">No projects yet</div>
        <div class="text-gray-500">Click the button below to add a project</div>
      </div>
    </div>
  </div>
</template>
