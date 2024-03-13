export default [
    {
        path: "user/imt_calculations/print",
        name: "user-imt_calculations-print",
        component: () => import(/* webpackPrefetch: true */ "./Print.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Download",
            basePath: "/user/imt_calculations",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Imtcalculations",

                    url: "/user/imt_calculations",
                },
                {
                    title: "Print",

                    active: "1",
                },
            ],
            pageTitle: "Print imt_calculations",
        },
    },
    {
        path: "user/imt_calculations/create",
        name: "user-imt_calculations-create-form",
        component: () => import(/* webpackPrefetch: true */ "./Create.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Create",
            basePath: "/user/imt_calculations",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Imtcalculations",

                    url: "/user/imt_calculations",
                },
                {
                    title: "Create Imtcalculation",

                    active: "1",
                },
            ],
            pageTitle: "Create Imtcalculation",
        },
    },
    {
        path: "user/imt_calculations",
        name: "user-imt_calculations-index",
        component: () => import(/* webpackPrefetch: true */ "./Index.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/imt_calculations",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Imtcalculations",

                    active: "1",
                },
            ],
            pageTitle: "Imtcalculations",
        },
    },
    {
        path: "user/imt_calculations/:id/edit",
        name: "user-imt_calculations-update-form",
        component: () => import(/* webpackPrefetch: true */ "./Update.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Update",
            basePath: "/user/imt_calculations",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Imtcalculations",

                    url: "/user/imt_calculations",
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1",
                },
            ],
            pageTitle: "Update Imtcalculation",
        },
    },
    {
        path: "user/imt_calculations/:id",
        name: "user-imt_calculations-detail",
        component: () => import(/* webpackPrefetch: true */ "./Detail.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/imt_calculations",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Imtcalculations",

                    url: "/user/imt_calculations",
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1",
                },
            ],
            pageTitle: "Imtcalculation Details",
        },
    },
];
