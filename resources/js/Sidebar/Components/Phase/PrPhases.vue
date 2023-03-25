<script setup lang="ts">
import ThreeVDots from '@/Components/Icons/ThreeVDots.vue';

import { Link } from '@inertiajs/vue3';
import { onBeforeUnmount, onMounted } from "vue";

const props = defineProps<{
    project: Project
}>()

const phaseChannel = Echo.private(`private.projects.${props.project.id}.phases`);
onMounted(() => {
    phaseChannel
        .listen(".PhaseCreated", (e: any) => {
            console.log("PhaseCreated", e);
            if (!props.project.phases) props.project.phases = [];
            props.project.phases.push(e.model);
        })
})

onBeforeUnmount(() => {
    phaseChannel.stopListening(".PhaseCreated");
})

</script>

<template>
    <div
        class="project-phase"
        v-if="project.phases?.length"
        v-for="(phase, index) in project.phases"
        :key="phase.id"
    >
        <div class="project-phase-circle" :style="{ '--circle-bg': phase.color ?? '' }"></div>
        <div class="project-phase-name">
            <Link href="#">Phase {{ (index + 1) + " - " +  phase.name }}</Link>
        </div>
        <div class="project-phase-icons">
            <ThreeVDots />
        </div>

        <span class="phase-task-number">{{ phase.tasks_count ?? 0 }}</span>
    </div>
    <div v-else>
        No phases yet
    </div>
</template>
