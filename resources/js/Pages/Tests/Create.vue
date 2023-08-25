<template>
    <AuthenticatedLayout>
        <div class="space-y-5">
            <label class="text-base font-semibold text-gray-900"
                >Add Questions</label
            >
            <div
                class="flex items-start gap-6 mx-4"
                v-for="(question, index) in questions"
                :key="index"
            >
                <p class="mt-4 text-sm font-medium text-gray-500">
                    Qustion {{ index + 1 }}.
                </p>
                <div>
                    <TextInput
                        v-model="question.question"
                        :error="errors?.question?.question"
                        autocomplete="current-password"
                    />
                    <fieldset class="mt-4">
                        <legend class="sr-only">Notification method</legend>
                        <div
                            class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0"
                        >
                            <div class="flex items-center">
                                <input
                                    :id="`options_a_${index}`"
                                    :name="`notification-method-${index}`"
                                    type="radio"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
                                    value="options_a"
                                    v-model="question.answer"
                                />
                                <label
                                    :for="`options_a_${index}`"
                                    class="block ml-3"
                                >
                                    <TextInput
                                        v-model="question.options_a"
                                        :error="errors?.question?.options_a"
                                        autocomplete="current-password"
                                /></label>
                            </div>
                            <div class="flex items-center">
                                <input
                                    :id="`options_b_${index}`"
                                    :name="`notification-method-${index}`"
                                    type="radio"
                                    value="options_b"
                                    v-model="question.answer"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
                                />
                                <label
                                    :for="`options_b_${index}`"
                                    class="block ml-3"
                                >
                                    <TextInput
                                        v-model="question.options_b"
                                        :error="errors?.question?.options_b"
                                        autocomplete="current-password"
                                /></label>
                            </div>
                            <div class="flex items-center">
                                <input
                                    :id="`options_c_${index}`"
                                    :name="`notification-method-${index}`"
                                    type="radio"
                                    value="options_c"
                                    v-model="question.answer"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
                                />
                                <label
                                    :for="`options_c_${index}`"
                                    class="block ml-3"
                                >
                                    <TextInput
                                        v-model="question.options_c"
                                        :error="errors?.question?.options_c"
                                        autocomplete="current-password"
                                /></label>
                            </div>
                            <div class="flex items-center">
                                <input
                                    :id="`options_d_${index}`"
                                    :name="`notification-method-${index}`"
                                    type="radio"
                                    value="options_d"
                                    v-model="question.answer"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
                                />
                                <label
                                    :for="`options_d_${index}`"
                                    class="block ml-3"
                                >
                                    <TextInput
                                        v-model="question.options_d"
                                        :error="errors?.question?.options_d"
                                        autocomplete="current-password"
                                /></label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="">
                <PrimaryButton class="w-52" @click.prevent="addNewQuestion">
                    Add New Question
                </PrimaryButton>
                <Button @click.prevent="submitQuestions">Submit</Button>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import { ref } from "vue";
const props = defineProps({
    errors: Object,
});
const notificationMethods = [
    { id: "email", title: "Email" },
    { id: "sms", title: "Phone (SMS)" },
    { id: "push", title: "Push notification" },
];
const questions = ref([
    {
        question: "",
        options_a: "",
        options_b: "",
        options_c: "",
        options_d: "",
        answer: "",
    },
]);
const newQuestion = ref({
    question: "",
    options_a: "",
    options_b: "",
    options_c: "",
    options_d: "",
    answer: "",
});

const addNewQuestion = () => {
    questions.value.push(newQuestion.value);
};
const submitQuestions = () => {
    console.log(questions.value);
};
</script>
