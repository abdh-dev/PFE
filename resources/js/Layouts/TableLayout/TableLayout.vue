<script setup lang="ts">
import THead from '@/Layouts/TableLayout/THead.vue';
import TableHead from '@/Layouts/TableLayout/TableHead.vue';
import TableRow from '@/Layouts/TableLayout/TableRow.vue';
import TData from '@/Layouts/TableLayout/TData.vue';

import { computed } from 'vue'

type Props = {
    obj: Project[],
    action: string[] | null,
    max?: number
}

const props = withDefaults(defineProps<Props>(), {
    action: null,
    max: 4
})

const emit = defineEmits<{
    (event: 'view', ...args: any[]): void
    (event: 'edit', ...args: any[]): void
    (event: 'delete', ...args: any[]): void
}>()

const filteredKeys = computed(() => {
    if (props.obj.length === 0) return []
    return Object.keys(props.obj[0]).map(key => {
        return key.split('_').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ')
    })
})
</script>

<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <TableHead>
                <template v-for="(item, index) in filteredKeys">
                    <THead :key="item" v-if="index <= max">
                        {{ item }}
                    </THead>
                </template>
                <THead v-if="action !== null">
                    Action
                </THead>
            </TableHead>
            <tbody>
            <TableRow v-for="(item, index) in obj" :key="index" :border="index + 1 !== obj.length" >
                <template v-for="(value, key, indexData) in item">
                    <TData :key="key" v-if="indexData <= max">
                        {{ value }}
                    </TData>
                </template>
                <TData v-if="action !== null">
                    <template v-for="(actionItem, index) in action" :key="index">
                        <a class="text-blue-500 hover:text-blue-600 mr-1" @click.prevent="$emit(actionItem.toLowerCase(), item)">
                            {{ actionItem }}
                        </a>
                    </template>
                </TData>
            </TableRow>
            </tbody>
        </table>
    </div>
</template>
