module.exports = {
    methods: {
        /**
         * Translate the given key.
         */
        ___(key, replace) {
            let translation

            try {
                translation = key.split('.').reduce((t, i) => t[i] || null, window._translations[window._locale]['php'])

                if (translation) {
                    _.forEach(replace, (value, key) => {
                        translation = translation.replace(':' + key, value)
                    })

                    return translation
                }
            } catch (e) {
                translation = key
            }

            return 'Missing translation'
        }
    },
}
