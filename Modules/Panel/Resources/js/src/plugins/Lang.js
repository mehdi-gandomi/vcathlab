import Translator, { Replacements, LangOptions } from 'lang.js';

/**
 * Adds localization to Vue.
 */
const Lang = {
	install: (Vue, options = {}) => {
		// Defines default options
		options = {
			globalTranslationsKey: 'strings',
			...options,
		};

		// Creates the Lang.js object
		const i18n = new Translator({
			fallback: document.documentElement.lang || navigator.language,
			messages: options?.messages ?? [],
			...options,
		});

		// Defines a global translation function
		const __ = (...args) => {
			// Non-global translations
			// if (key.match(/^[\w-]+(?:\.[\w-]+)+$/)) {
			// 	return i18n.get(key, ...args);
			// }

			// // Global translations
			// // const result = i18n.get(`${options.globalTranslationsKey}.${key}`, ...args);

			// return result.startsWith(options.globalTranslationsKey!)
			// 	? result.substr(options.globalTranslationsKey!.length + 1)
			// 	: result;
            if(!i18n.has(...args)){
                var oldKey=args[0];
                args[0]=`${options.globalTranslationsKey}.${args[0]}`;
                if(!i18n.has(...args)) return oldKey;
            }
            return i18n.get(...args);
		};

		Vue.mixin({
			methods: {
				$lang: () => i18n,
				__,
			},
		});
	},
};

export default Lang;
