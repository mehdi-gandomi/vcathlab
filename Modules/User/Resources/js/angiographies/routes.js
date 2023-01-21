export default [
    {
        path: "user/angiographies/print",
        name: "user-angiographies-print",
        component: () => import(/* webpackPrefetch: true */ "./Print.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Download",
            basePath: "/user/angiographies",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Angiographies",

                    url: "/user/angiographies",
                },
                {
                    title: "Print",

                    active: "1",
                },
            ],
            pageTitle: "Print angiographies",
        },
    },
    {
        path: "user/angiographies/create",
        name: "user-angiographies-create-form",
        component: () => import(/* webpackPrefetch: true */ "./Create.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Create",
            basePath: "/user/angiographies",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Angiographies",

                    url: "/user/angiographies",
                },
                {
                    title: "Create Angiography",

                    active: "1",
                },
            ],
            pageTitle: "Create Angiography",
        },
    },
    {
        path: "user/angiographies",
        name: "user-angiographies-index",
        component: () => import(/* webpackPrefetch: true */ "./Index.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/angiographies",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Angiographies",

                    active: "1",
                },
            ],
            pageTitle: "Angiographies",
        },
    },
    {
        path: "user/angiographies/:id/edit",
        name: "user-angiographies-update-form",
        component: () => import(/* webpackPrefetch: true */ "./Update.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Update",
            basePath: "/user/angiographies",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Angiographies",

                    url: "/user/angiographies",
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1",
                },
            ],
            pageTitle: "Update Angiography",
        },
    },
    {
        path: "user/angiographies/:id",
        name: "user-angiographies-detail",
        component: () => import(/* webpackPrefetch: true */ "./Detail.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/angiographies",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Angiographies",

                    url: "/user/angiographies",
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1",
                },
            ],
            pageTitle: "Angiography Details",
        },
    },
];
