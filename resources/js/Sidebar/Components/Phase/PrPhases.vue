<script setup lang="ts">
import ThreeVDots from '@/Components/Icons/ThreeVDots.vue';

import { Link } from '@inertiajs/vue3';
import { onMounted } from "vue";

const props = defineProps<{
    project: Project
}>()

let subscribed = false;

onMounted(() => {
    const phaseChannel = Echo.private(`private.projects.${props.project.id}.phases`);
    if (!subscribed) {
        phaseChannel
            .listen(".PhaseCreated", (e: any) => {
                console.log("PhaseCreated", e);
                if (!props.project.phases) props.project.phases = [];
                props.project.phases.push(e.model);
            })
        subscribed = true;
    }
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

        <span class="phase-task-number">{{ phase.tasks?.length ?? 0 }}</span>
    </div>
    <div v-else>
        No phases yet
    </div>

</template>
