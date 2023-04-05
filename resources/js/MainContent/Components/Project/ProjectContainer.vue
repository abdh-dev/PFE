<script setup lang="ts">
import { useWebsocket } from '@/hooks/useWebsocket'
import { useProjectStore } from '@/stores/project'
import PhaseContainer from '@/MainContent/Components/Phase/PhaseContainer.vue'

const props = defineProps<{
  project: Project
}>()

const useProject = useProjectStore()
const { pushPhase, pushTask } = useProject

useWebsocket(`private.project.${props.project.id}`, {
  '.PhaseCreated': (e) => pushPhase(e.projectId, e.model),
  '.TaskCreated': (e) => pushTask(e.projectId, e.phaseId, e.model),
})
</script>

<template>
  <div>
    {{ project.name }}
    <PhaseContainer
      v-for="(phase, index) in project.phases"
      :key="phase.id"
      :phase="phase"
      :project="project"
      :index="index"
    />
  </div>
</template>
