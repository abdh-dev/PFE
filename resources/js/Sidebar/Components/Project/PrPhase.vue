<script setup lang="ts">
import ThreeVDots from '@/Components/Icons/ThreeVDots.vue';

import { computed } from "vue";
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
    phase: Phase
    number: number
}>()

const phaseColor = computed(() => {
    return props.phase.color ? props.phase.color : '';
});

const taskNumber = computed(() => {
    return props.phase.tasks?.length ?? 0;
});



</script>

<template>
    <div class="project-phase">
        <div class="project-phase-circle" :style="{ '--circle-bg': phaseColor }"></div>
        <div class="project-phase-name">
            <Link href="#">Phase {{ number + " - " +  phase.name }}</Link>
        </div>
        <div class="project-phase-icons">
            <ThreeVDots />
        </div>

        <span class="phase-task-number">{{ taskNumber }}</span>
    </div>
</template>


