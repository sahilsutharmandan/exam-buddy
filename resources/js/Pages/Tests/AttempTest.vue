<template>
    <AuthenticatedLayout>
        <div class="grid grid-cols-4 gap-5">
            <div class="grid grid-cols-2 col-span-3 gap-5">
                <div
                    v-for="(question, index) in test.questions"
                    :key="question.id"
                    class="p-5 border rounded-xl"
                >
                    <p>
                        Q.{{ index + 1 }}
                        <span class="ml-1"> {{ question.question }}</span>
                    </p>
                    <fieldset class="mt-4">
                        <div class="flex flex-col gap-5">
                            <div class="flex items-center gap-3">
                                <p class="text-sm font-medium text-gray-500">
                                    A.
                                </p>
                                <input
                                    :id="`options_a_${index}`"
                                    :name="`questions-options-${index}`"
                                    type="radio"
                                    class="radio-box"
                                    value="options_a"
                                    v-model="answer[index]"
                                />
                                <label
                                    :for="`options_a_${index}`"
                                    class="block"
                                >
                                    {{ question.options_a }}
                                </label>
                            </div>
                            <div class="flex items-center gap-3">
                                <p class="text-sm font-medium text-gray-500">
                                    B.
                                </p>
                                <input
                                    :id="`options_b_${index}`"
                                    :name="`questions-options-${index}`"
                                    type="radio"
                                    value="options_b"
                                    v-model="answer[index]"
                                    class="radio-box"
                                />
                                <label
                                    :for="`options_b_${index}`"
                                    class="block"
                                >
                                    {{ question.options_b }}
                                </label>
                            </div>
                            <div class="flex items-center gap-3">
                                <p class="text-sm font-medium text-gray-500">
                                    C.
                                </p>
                                <input
                                    :id="`options_c_${index}`"
                                    :name="`questions-options-${index}`"
                                    type="radio"
                                    value="options_c"
                                    v-model="answer[index]"
                                    class="radio-box"
                                />
                                <label
                                    :for="`options_c_${index}`"
                                    class="block"
                                >
                                    {{ question.options_c }}
                                </label>
                            </div>
                            <div class="flex items-center gap-3">
                                <p class="text-sm font-medium text-gray-500">
                                    D.
                                </p>
                                <input
                                    :id="`options_d_${index}`"
                                    :name="`questions-options-${index}`"
                                    type="radio"
                                    value="options_d"
                                    v-model="answer[index]"
                                    class="radio-box"
                                />
                                <label
                                    :for="`options_d_${index}`"
                                    class="block"
                                >
                                    {{ question.options_d }}
                                </label>
                            </div>
                            <div class="flex items-center gap-3">
                                <p class="text-sm font-medium text-gray-500">
                                    E.
                                </p>
                                <input
                                    :id="`options_e_${index}`"
                                    :name="`questions-options-${index}`"
                                    type="radio"
                                    value="options_e"
                                    v-model="answer[index]"
                                    class="radio-box"
                                />
                                <label
                                    :for="`options_d_${index}`"
                                    class="block"
                                >
                                    {{ question.options_e }}
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="col-span-1 space-y-5">
                <div class="flex justify-center p-5 border shadow rounded-xl">
                    <Timer :time="test.test_duration_time" />
                </div>
                <div class="">
                    <p class="pb-3 font-medium">{{ test.test_name }}:</p>
                    <div class="grid grid-cols-4 gap-3">
                        <div
                            class="font-medium text-center border rounded-md"
                            :class="
                                answer[index]
                                    ? 'bg-green-100 text-green-600 border-green-200'
                                    : ''
                            "
                            v-for="(item, index) in test.questions.length"
                            :key="item"
                        >
                            {{ item }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import { ref } from "vue";

defineProps({
    test: Object,
});
const answer = ref([]);
</script>
