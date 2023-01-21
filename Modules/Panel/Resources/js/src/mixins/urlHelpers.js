module.exports = {
    methods: {
        /**
         * Translate the given key.
         */
        asset(path) {
            return `${window.config.base}/${path}`;
        },
        url(path) {
            return `${window.config.base}/${path}`;
        },
        serverUrl(url){
            return `${window.config.base}/${url}`
        }
    },
}
