<script setup lang="ts">
import PhaseContainer from '@/MainContent/Components/Phase/PhaseContainer.vue'
import { useWebsocket } from '@/hooks/useWebsocket'
import { Ref, ref } from 'vue'

const props = defineProps<{
  project: Project
}>()

const project = ref<Project>(props.project) as Ref<Project>

useWebsocket(`private.project.${project.value.id}.phases`, {
  '.PhaseCreated': (e: SocketEvent) => {
    if (!project.value.phases) project.value.phases = []
    project.value.phases.push(e.model)
    console.log(project.value.phases)
  },
})
</script>

<template>
  <div>
    {{ project.name }}
    <PhaseContainer
      v-for="(phase, index) in project.phases"
      :key="phase.id"
      :project="project"
      :phase="phase"
      :index="index"
    />
  </div>
</template>
