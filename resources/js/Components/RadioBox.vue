<template>
    <fieldset>
        <div class="flex items-center gap-2">
            <input
                v-bind="attrs"
                :id="id"
                :name="name"
                :value="value"
                type="radio"
                class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
            />
            <label :for="id">{{ label }}</label>
        </div>
    </fieldset>
</template>

<script setup>
defineProps({
    id: {
        type: String,
        default: `input_${Math.floor(Math.random() * 1000)}`,
    },
    name: {
        type: String,
    },
    value: {
        type: String,
    },
    label: {
        type: String,
    },
    modelValue: String,
});
const emitChange = (newValue) => {
    emit("update:modelValue", newValue);
};
</script>
