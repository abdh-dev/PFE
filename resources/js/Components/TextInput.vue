<script setup lang="ts">
import { onMounted, ref } from 'vue';

type PropsType = {
    modelValue: string | number | boolean | null | undefined | string[],
    disabled?: boolean,
};

const props = withDefaults(defineProps<PropsType>(), {
    modelValue: '',
    disabled: false,
});

const emit = defineEmits<{
    (event: 'update:modelValue', value: string | number): void,
}>();

const input = ref<HTMLInputElement | null>(null);

onMounted(() => {
    if (input.value?.hasAttribute('autofocus')) {
        input.value?.focus();
    }
});

defineExpose({ focus: () => input.value?.focus() });
</script>

<template>
    <input
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        :value="props.modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
        :disabled="props.disabled !== undefined ? props.disabled : false"
    />
</template>
