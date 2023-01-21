export default [
    {
        path: "user/body_compositions/print",
        name: "user-body_compositions-print",
        component: () => import(/* webpackPrefetch: true */ "./Print.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Download",
            basePath: "/user/body_compositions",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Bodycompositions",

                    url: "/user/body_compositions",
                },
                {
                    title: "Print",

                    active: "1",
                },
            ],
            pageTitle: "Print body_compositions",
        },
    },
    {
        path: "user/body_compositions/create",
        name: "user-body_compositions-create-form",
        component: () => import(/* webpackPrefetch: true */ "./Create.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Create",
            basePath: "/user/body_compositions",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Bodycompositions",

                    url: "/user/body_compositions",
                },
                {
                    title: "Create Bodycomposition",

                    active: "1",
                },
            ],
            pageTitle: "Create Bodycomposition",
        },
    },
    {
        path: "user/body_compositions",
        name: "user-body_compositions-index",
        component: () => import(/* webpackPrefetch: true */ "./Index.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/body_compositions",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Bodycompositions",

                    active: "1",
                },
            ],
            pageTitle: "Bodycompositions",
        },
    },
    {
        path: "user/body_compositions/:id/edit",
        name: "user-body_compositions-update-form",
        component: () => import(/* webpackPrefetch: true */ "./Update.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Update",
            basePath: "/user/body_compositions",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Bodycompositions",

                    url: "/user/body_compositions",
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1",
                },
            ],
            pageTitle: "Update Bodycomposition",
        },
    },
    {
        path: "user/body_compositions/:id",
        name: "user-body_compositions-detail",
        component: () => import(/* webpackPrefetch: true */ "./Detail.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/body_compositions",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Bodycompositions",

                    url: "/user/body_compositions",
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1",
                },
            ],
            pageTitle: "Bodycomposition Details",
        },
    },
];
