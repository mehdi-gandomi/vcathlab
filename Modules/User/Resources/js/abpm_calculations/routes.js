export default [
    {
        path: "user/abpm_calculations/print",
        name: "user-abpm_calculations-print",
        component: () => import(/* webpackPrefetch: true */ "./Print.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Download",
            basePath: "/user/abpm_calculations",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "ABPMcalculations",

                    url: "/user/abpm_calculations",
                },
                {
                    title: "Print",

                    active: "1",
                },
            ],
            pageTitle: "Print ABPM",
        },
    },
    {
        path: "user/abpm_calculations",
        name: "user-abpm_calculations-index",
        component: () => import(/* webpackPrefetch: true */ "./Index.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/abpm_calculations",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "ABPMcalculations",

                    active: "1",
                },
            ],
            pageTitle: "ABPMcalculations",
        },
    },
    {
        path: "user/abpm_calculations/:id",
        name: "user-abpm_calculations-detail",
        component: () => import(/* webpackPrefetch: true */ "./Detail.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/abpm_calculations",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "ABPMcalculations",

                    url: "/user/abpm_calculations",
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1",
                },
            ],
            pageTitle: "ABPM Details",
        },
    },
];
