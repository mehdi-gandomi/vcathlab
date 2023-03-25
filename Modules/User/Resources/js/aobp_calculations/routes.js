export default [
    {
        path: "user/aobp_calculations/print",
        name: "user-aobp_calculations-print",
        component: () => import(/* webpackPrefetch: true */ "./Print.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Download",
            basePath: "/user/aobp_calculations",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Aobpcalculations",

                    url: "/user/aobp_calculations",
                },
                {
                    title: "Print",

                    active: "1",
                },
            ],
            pageTitle: "Print aobp_calculations",
        },
    },
    {
        path: "user/aobp_calculations",
        name: "user-aobp_calculations-index",
        component: () => import(/* webpackPrefetch: true */ "./Index.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/aobp_calculations",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Aobpcalculations",

                    active: "1",
                },
            ],
            pageTitle: "Aobpcalculations",
        },
    },
    {
        path: "user/aobp_calculations/:id",
        name: "user-aobp_calculations-detail",
        component: () => import(/* webpackPrefetch: true */ "./Detail.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/aobp_calculations",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Aobpcalculations",

                    url: "/user/aobp_calculations",
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1",
                },
            ],
            pageTitle: "Aobpcalculation Details",
        },
    },
];
