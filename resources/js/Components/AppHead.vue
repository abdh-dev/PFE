<script setup lang="ts">
import { Head } from '@inertiajs/vue3'

defineProps<{
    title: string
}>()
</script>

<template>
    <Head>
        <title>{{title}}</title>
        <slot />
    </Head>
</template>
