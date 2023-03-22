export default [
	...require('@external_modules/AccessLevel/Resources/js/menus/routes.js').default,
 	...require('@external_modules/AccessLevel/Resources/js/subsystems/routes.js').default,
 	...require('@external_modules/AccessLevel/Resources/js/roles/routes.js').default,
 	...require('@external_modules/AccessLevel/Resources/js/users/routes.js').default,
 	...require('@external_modules/AccessLevel/Resources/js/user_activities/routes.js').default,
 	...require('@external_modules/Admin/Resources/js/complex_case_categories/routes.js').default,
 	...require('@external_modules/Admin/Resources/js/users/routes.js').default,
     ...require('@external_modules/Admin/Resources/js/ct_cases/routes.js').default,
     ...require('@external_modules/Admin/Resources/js/niffr_cases/routes.js').default,
 	...require('@external_modules/User/Resources/js/complex_cases/routes.js').default,
 	...require('@external_modules/User/Resources/js/complex_case_categories/routes.js').default,
 	...require('@external_modules/User/Resources/js/ct_cases/routes.js').default,
 	...require('@external_modules/User/Resources/js/niffr_cases/routes.js').default,
 	...require('@external_modules/User/Resources/js/patients/routes.js').default,
 	// ...require('@external_modules/Admin/Resources/js/plans/routes.js').default,
	...require('@external_modules/Admin/Resources/js/complex_cases/routes.js').default,
	...require('@external_modules/Admin/Resources/js/comments/routes.js').default,


	...require('@external_modules/Admin/Resources/js/physicians/routes.js').default,

    {
        path: '/computation_center/assesment',
        name: 'computation_center-assesment',
        component: ()=> import('@external_modules/User/Resources/js/computation_center/New.vue'),
    },
    {
        path: '/computation_center/list',
        name: 'computation_center-list',
        component: ()=> import('@external_modules/User/Resources/js/computation_center/List.vue'),
    },
    {
        path: '/mace_assesment',
        name: 'mace-assesment',
        component: ()=> import('@external_modules/User/Resources/js/MACE.vue'),
    },
    {
        path: '/mace_ghasemi',
        name: 'mace-ghasemi',
        component: ()=> import('@external_modules/User/Resources/js/mace_ghasemi.vue'),
    },
    {
        path: '/echocardiography',
        name: 'mace-assesment',
        component: ()=> import('@external_modules/User/Resources/js/Echo.vue'),
    },
    {
        path: '/angiography',
        name: 'angiography',
        component: ()=> import('@external_modules/User/Resources/js/Angiography.vue'),
    },
    {
        path: '/body_analyzer',
        name: 'body-analyzer',
        component: ()=> import('@external_modules/User/Resources/js/BodyAnalyzer.vue'),
    },
    {
        path: '/admin/report',
        name: 'report',
        component: ()=> import('@external_modules/Admin/Resources/js/Report.vue'),
    },
	...require('@external_modules/User/Resources/js/mace_assesments/routes.js').default,
	...require('@external_modules/User/Resources/js/echo_calculations/routes.js').default,
	...require('@external_modules/User/Resources/js/body_compositions/routes.js').default,
    ...require('@external_modules/User/Resources/js/angiographies/routes.js').default,
];
