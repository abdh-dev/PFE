<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AppHead from '@/Components/AppHead.vue';
import Sidebar from '@/Sidebar/Sidebar.vue';

defineProps<{
    sidebarProjects: Project[]
}>();

</script>

<template>
    <AppHead title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-8">
            <div class="max-w-9xl mx-auto sm:px-2 lg:px-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <Sidebar :projects="sidebarProjects"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
