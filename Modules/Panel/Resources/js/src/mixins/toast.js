export default {
    methods: {
        /**
         * Show a success message to the user.
         *
         * @param {string} message
         */
        success(message) {
            console.log(this)
            this.$toasted.show(message, { type: 'success' })
        },

        /**
         * Show a warning message to the user.
         *
         * @param {string} message
         */
        warning(message) {
            this.$toasted.show(message, { type: 'warning' })
        },
            /**
         * Show a warning message to the user.
         *
         * @param {string} message
         */
        danger(message) {
            this.$toasted.show(message, { type: 'dange' })
        }
    },
}
