<template>
    <p class="text-4xl font-extrabold">
        {{ formattedHours }} : {{ formattedMinutes }} : {{ formattedSeconds }}
    </p>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, computed } from "vue";

const props = defineProps({
    time: [String, Number],
});
const totalSeconds = ref(0);
const timer = ref(null);

const hours = computed(() => Math.floor(totalSeconds.value / 3600));
const minutes = computed(() => Math.floor((totalSeconds.value % 3600) / 60));
const seconds = computed(() => totalSeconds.value % 60);

const startTimer = (minutes) => {
    totalSeconds.value = minutes * 60;

    timer.value = setInterval(() => {
        if (totalSeconds.value > 0) {
            totalSeconds.value--;
        } else {
            clearInterval(timer.value);
        }
    }, 1000);
};

const formatNumber = (number) => {
    return number < 10 ? `0${number}` : `${number}`;
};

const formattedHours = computed(() => formatNumber(hours.value));
const formattedMinutes = computed(() => formatNumber(minutes.value));
const formattedSeconds = computed(() => formatNumber(seconds.value));

onMounted(() => {
    startTimer(props?.time);
});

onBeforeUnmount(() => {
    clearInterval(timer.value);
});
</script>
