<template>
    <AuthenticatedLayout>
        <div class="grid grid-cols-3 gap-5 divide-x">
            <div class="flex-1 col-span-2 space-y-5">
                <label class="text-base font-semibold text-gray-900"
                    >Questions</label
                >
                <div
                    class="flex gap-5 text-sm"
                    v-for="(question, index) in questions"
                    :key="index"
                >
                    <p class="text-sm font-medium text-gray-500">
                        Qustion {{ index + 1 }}.
                    </p>
                    <div class="flex-grow space-y-2">
                        <p>{{ question.question }}?</p>
                        <div class="flex gap-5">
                            <div class="flex gap-2">
                                <span>A.</span>
                                <p>{{ question.options_a }}</p>
                            </div>
                            <div class="flex gap-2">
                                <span>B.</span>
                                <p>{{ question.options_b }}</p>
                            </div>
                            <div class="flex gap-2">
                                <span>C.</span>
                                <p>{{ question.options_c }}</p>
                            </div>
                            <div class="flex gap-2">
                                <span>D.</span>
                                <p>{{ question.options_d }}</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-7">
                        {{ question[question.answer] }}
                    </p>
                    <button
                        @click="deleteQuestion(index)"
                        class="mt-5 !w-8 !p-2 btn btn-icon-danger"
                    >
                        <TrashIcon class="w-5" />
                    </button>
                </div>
            </div>
            <div class="px-5 space-y-5">
                <label class="text-base font-semibold text-gray-900"
                    >Add Question</label
                >
                <div class="flex items-start gap-6 mx-4">
                    <p class="mt-4 text-sm font-medium text-gray-500">
                        Qustion
                    </p>
                    <div>
                        <TextInput
                            v-model="newQuestion.question"
                            :error="errors?.newQuestion?.question"
                            autocomplete="current-password"
                        />
                        <fieldset class="mt-4">
                            <legend class="sr-only">Notification method</legend>
                            <div class="flex flex-col gap-5">
                                <div class="flex items-center gap-3">
                                    <p
                                        class="text-sm font-medium text-gray-500"
                                    >
                                        A.
                                    </p>
                                    <input
                                        id="options_a"
                                        name="notification-method"
                                        type="radio"
                                        class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
                                        value="options_a"
                                        v-model="newQuestion.answer"
                                    />
                                    <label for="options_a" class="block">
                                        <TextInput
                                            v-model="newQuestion.options_a"
                                            :error="
                                                errors?.newQuestion?.options_a
                                            "
                                            autocomplete="current-password"
                                    /></label>
                                </div>
                                <div class="flex items-center gap-3">
                                    <p
                                        class="text-sm font-medium text-gray-500"
                                    >
                                        B.
                                    </p>
                                    <input
                                        id="options_b"
                                        name="notification-method"
                                        type="radio"
                                        value="options_b"
                                        v-model="newQuestion.answer"
                                        class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
                                    />
                                    <label for="options_b" class="block">
                                        <TextInput
                                            v-model="newQuestion.options_b"
                                            :error="
                                                errors?.newQuestion?.options_b
                                            "
                                            autocomplete="current-password"
                                    /></label>
                                </div>
                                <div class="flex items-center gap-3">
                                    <p
                                        class="text-sm font-medium text-gray-500"
                                    >
                                        C.
                                    </p>
                                    <input
                                        id="options_c"
                                        name="notification-method"
                                        type="radio"
                                        value="options_c"
                                        v-model="newQuestion.answer"
                                        class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
                                    />
                                    <label for="options_c" class="block">
                                        <TextInput
                                            v-model="newQuestion.options_c"
                                            :error="
                                                errors?.newQuestion?.options_c
                                            "
                                            autocomplete="current-password"
                                    /></label>
                                </div>
                                <div class="flex items-center gap-3">
                                    <p
                                        class="text-sm font-medium text-gray-500"
                                    >
                                        D.
                                    </p>
                                    <input
                                        id="options_d"
                                        name="notification-method"
                                        type="radio"
                                        value="options_d"
                                        v-model="newQuestion.answer"
                                        class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
                                    />
                                    <label for="options_d" class="block">
                                        <TextInput
                                            v-model="newQuestion.options_d"
                                            :error="
                                                errors?.newQuestion?.options_d
                                            "
                                            autocomplete="current-password"
                                    /></label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="">
                    <InputError class="my-2" :message="errorMessage" />
                    <PrimaryButton class="w-52" @click.prevent="addNewQuestion">
                        Add New Question
                    </PrimaryButton>
                </div>
            </div>
            <div class="flex col-span-3 gap-3 border-none">
                <button class="!w-52 btn btn-secondary" @click.prevent="goBack">
                    Cancel
                </button>
                <PrimaryButton class="!w-52" @click.prevent="submitQuestions">
                    Save Questions
                </PrimaryButton>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import { ref } from "vue";
import InputError from "@/Components/InputError.vue";
import axios from "axios";
import { TrashIcon } from "@heroicons/vue/24/outline";
const props = defineProps({
    errors: Object,
});

const questions = ref([
    {
        question: "What is the capital of Canada",
        options_a: "Ottawa",
        options_b: "Toronto",
        options_c: "Vancouver",
        options_d: "Montreal",
        answer: "options_a",
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
const errorMessage = ref("");
const errors = ref([]);
const addNewQuestion = () => {
    errors.value = [];
    Object.keys(newQuestion.value).find((key) => {
        if (newQuestion.value[key] === "") {
            errors.value.push(key);
        }
    });

    if (errors.value.length > 1) {
        errorMessage.value = "All field is mandatory";
    } else if (errors.value[0] === "answer" && errors.value.length === 1) {
        errorMessage.value = "Answer is not selected.";
    } else {
        errorMessage.value = "";
        questions.value.push({ ...newQuestion.value });
        newQuestion.value = {
            question: "",
            options_a: "",
            options_b: "",
            options_c: "",
            options_d: "",
            answer: "",
        };
    }
};
const deleteQuestion = (index) => {
    questions.value.splice(index, 1);
};
const jsonData = JSON.stringify(questions.value);
const submitQuestions = async () => {
    await axios
        .post(route("tests.store"), { questions: jsonData })
        .then((response) => {
            console.log(response.data.message);
        })
        .catch((error) => {
            console.error(error);
        });
};
const goBack = () => {
    window.location.href = route("tests.index");
};
</script>
