<script setup lang="ts">
import SideArrow from "@/Components/Icons/SideArrow.vue";

import { ref } from "vue";

const props = defineProps<{
    project: Project
    phase: Phase
    index: number
}>()

const isOpened = ref(true)

</script>

<template>
    <div
        class="phase-container flex-grow-1"
        :style="{ '--phase-color': phase.color, '--background-color': 'rgba(46, 205, 111, 0.1)' }"
    >
        <div class="phase-project-title">{{ project.name }}</div>
        <div class="side-arrow-dropdown-header">
            <div
                class="arrow-dropdown-toggle"
                :class="{ 'arrow-dropdown-toggle--open': isOpened }"
                :style="{ '--default-color': project.color }"
                @click="isOpened = !isOpened"
            >
                <SideArrow />
            </div>
            <div class="side-arrow-dropdown-header-phase-title">
                Phase {{ (index + 1) + " - " +  phase.name }}
            </div>
        </div>
        <div class="side-arrow-dropdown-content">
            <slot />
        </div>
    </div>
</template>
