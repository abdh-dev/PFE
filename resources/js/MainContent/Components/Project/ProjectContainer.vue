<script setup lang="ts">

const props = defineProps<{
    project: Project
}>()

</script>

<template>
    <div>
        {{ project.name }}
        <slot></slot>
    </div>
</template>
