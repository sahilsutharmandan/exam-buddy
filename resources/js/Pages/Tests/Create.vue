<template>
    <AdminAuthenticatedLayout>
        <form action="">
            <div class="grid grid-cols-3 gap-5 divide-x">
                <div class="flex-1 col-span-2 space-y-5">
                    <label class="text-base font-semibold text-gray-900"
                        >Test Details:</label
                    >
                    <div class="flex items-center gap-4">
                        <TextInput
                            v-model="form.test_name"
                            :error="errors?.test_name"
                            placeholder="Name"
                        />

                        <TextInput
                            v-model="form.test_duration_time"
                            :error="errors?.test_duration_time"
                            placeholder="Duration Time"
                            type="number"
                        />

                        <Dropdown
                            v-model="form.subject"
                            :options="subjects"
                            placeholder="Select a Subject"
                        />
                        <Calendar
                            v-model="form.date_range"
                            selectionMode="range"
                            :manualInput="false"
                            showIcon
                        />
                    </div>

                    <div>
                        <label class="text-base font-semibold text-gray-900"
                            >Questions:</label
                        >
                    </div>
                    <div
                        class="flex gap-5 text-sm"
                        v-for="(question, index) in form.questions"
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
                                <div class="flex gap-2">
                                    <span>E.</span>
                                    <p>{{ question.options_e }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="mt-7">
                            {{ question[question.answer] }}
                        </p>
                        <button
                            @click.prevent="deleteQuestion(index)"
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
                                <div class="flex flex-col gap-5">
                                    <div class="flex items-center gap-3">
                                        <p
                                            class="text-sm font-medium text-gray-500"
                                        >
                                            A.
                                        </p>
                                        <input
                                            id="options_a"
                                            name="questions-options"
                                            type="radio"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
                                            value="options_a"
                                            v-model="newQuestion.answer"
                                        />
                                        <label for="options_a" class="block">
                                            <TextInput
                                                v-model="newQuestion.options_a"
                                                :error="
                                                    errors?.newQuestion
                                                        ?.options_a
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
                                            name="questions-options"
                                            type="radio"
                                            value="options_b"
                                            v-model="newQuestion.answer"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
                                        />
                                        <label for="options_b" class="block">
                                            <TextInput
                                                v-model="newQuestion.options_b"
                                                :error="
                                                    errors?.newQuestion
                                                        ?.options_b
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
                                            name="questions-options"
                                            type="radio"
                                            value="options_c"
                                            v-model="newQuestion.answer"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
                                        />
                                        <label for="options_c" class="block">
                                            <TextInput
                                                v-model="newQuestion.options_c"
                                                :error="
                                                    errors?.newQuestion
                                                        ?.options_c
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
                                            name="questions-options"
                                            type="radio"
                                            value="options_d"
                                            v-model="newQuestion.answer"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
                                        />
                                        <label for="options_d" class="block">
                                            <TextInput
                                                v-model="newQuestion.options_d"
                                                :error="
                                                    errors?.newQuestion
                                                        ?.options_d
                                                "
                                                autocomplete="current-password"
                                        /></label>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <p
                                            class="text-sm font-medium text-gray-500"
                                        >
                                            E.
                                        </p>
                                        <input
                                            id="options_e"
                                            name="questions-options"
                                            type="radio"
                                            value="options_e"
                                            v-model="newQuestion.answer"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600"
                                        />
                                        <label for="options_d" class="block">
                                            None of these
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="">
                        <InputError class="my-2" :message="errorMessage" />
                        <PrimaryButton
                            class="w-52"
                            @click.prevent="addNewQuestion"
                        >
                            Add New Question
                        </PrimaryButton>
                    </div>
                </div>
                <div class="flex col-span-3 gap-3 border-none">
                    <button
                        class="!w-52 btn btn-secondary"
                        @click.prevent="goBack"
                    >
                        Cancel
                    </button>
                    <PrimaryButton
                        class="!w-52"
                        @click.prevent="
                            test?.id ? updateTest(test?.id) : submitTest()
                        "
                    >
                        {{ test?.id ? "Update " : "Add " }} Test
                    </PrimaryButton>
                </div>
            </div>
        </form>
    </AdminAuthenticatedLayout>
</template>
<script setup>
import { ref } from "vue";
import InputError from "@/Components/InputError.vue";
import Dropdown from "primevue/dropdown";
import { useForm } from "@inertiajs/vue3";
import { TrashIcon } from "@heroicons/vue/24/outline";
import { stringify } from "postcss";
const props = defineProps({
    errors: Object,
    test: Object,
});
const form = useForm(
    props?.test
        ? props.test
        : {
              test_name: "",
              test_duration_time: 0,
              subject: "",
              date_range: [],
              questions: [
                  {
                      question: "What is the capital of Canada",
                      options_a: "Ottawa",
                      options_b: "Toronto",
                      options_c: "Vancouver",
                      options_d: "Montreal",
                      options_e: "None of these",
                      answer: "options_a",
                  },
              ],
          }
);

const newQuestion = ref({
    question: "",
    options_a: "",
    options_b: "",
    options_c: "",
    options_d: "",
    options_e: "None of these",
    answer: "",
});
const errorMessage = ref("");
const errors = ref([]);
const subjects = ref([
    "All",
    "History",
    "Hindi",
    "Economics",
    "Sociology",
    "Psychology",
]);
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
        form.questions.push({ ...newQuestion.value });
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
    form.questions.splice(index, 1);
};

const submitTest = () => {
    const questionsJSON = JSON.stringify(form.questions);
    const dateRangeJSON = JSON.stringify(form.date_range);

    form.questions = questionsJSON;
    form.date_range = dateRangeJSON;

    form.post(route("admin.tests.store"));
};
const updateTest = (id) => {
    const questionsJSON = JSON.stringify(form.questions);
    const dateRangeJSON = JSON.stringify(form.date_range);

    form.questions = questionsJSON;
    form.date_range = dateRangeJSON;

    form.put(route("admin.tests.update", id));
};

const goBack = () => {
    window.location.href = route("admin.tests.index");
};
</script>
