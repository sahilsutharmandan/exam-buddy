export default {
    methods: {
        formatDate(date) {
            const options = { year: "numeric", month: "long", day: "numeric" };
            return new Date(date).toLocaleDateString("en-US", options);
        },
        formatCurrency(amount, currencyCode = "USD") {
            return new Intl.NumberFormat("en-US", {
                style: "currency",
                currency: currencyCode,
                minimumFractionDigits: 2,
            }).format(amount);
        },
        formatTime(minutes) {
            const hours = Math.floor(minutes / 60);
            const remainingMinutes = minutes % 60;
            return `${hours}h ${remainingMinutes}m`;
        },
    },
};
