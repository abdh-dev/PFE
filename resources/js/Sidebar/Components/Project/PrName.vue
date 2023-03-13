<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { computed } from "vue";

const props = defineProps<{
    project: Project,
}>()

const color = computed(() => props.project.color ?? '#7c828d');

</script>

<template>
    <div class="icon">
        <div :style="{'--avatar-color': color}">{{ project.name[0] }}</div>
    </div>
    <div class="project-name">
        <Link href="#">{{ project.name }}</Link>
    </div>
</template>

