import Vue from 'vue';

Vue.mixin({

    methods: {
        /**
         * Vue translator
         *
         * @param key
         * @param replacement
         * @returns {*}
         * @private
         */
        __(key, replacement = {}) {
            return window.Lang.get(key, replacement);
        },
    }
});
