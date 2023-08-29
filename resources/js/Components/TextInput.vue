<template>
    <div>
        <InputLabel :for="id" :value="label" />
        <input
            :id="id"
            :class="label ? 'mt-1' : ''"
            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            ref="input"
            :type="type"
        />

        <InputError class="mt-2" :message="error" />
    </div>
</template>
<script setup>
import { onMounted, ref } from "vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    id: {
        type: String,
        default: `input_${Math.floor(Math.random() * 1000)}`,
    },
    label: {
        type: String,
    },
    error: {
        type: String,
    },

    type: {
        type: String,
        default: "text",
    },
});

defineEmits(["update:modelValue"]);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>
