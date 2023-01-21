export default [
    {
        path: "user/computation_centers/print",
        name: "user-computation_centers-print",
        component: () => import(/* webpackPrefetch: true */ "./Print.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Download",
            basePath: "/user/computation_centers",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Computationcenters",

                    url: "/user/computation_centers",
                },
                {
                    title: "Print",

                    active: "1",
                },
            ],
            pageTitle: "Print computation_centers",
        },
    },
    {
        path: "user/computation_centers/create",
        name: "user-computation_centers-create-form",
        component: () => import(/* webpackPrefetch: true */ "./Create.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Create",
            basePath: "/user/computation_centers",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Computationcenters",

                    url: "/user/computation_centers",
                },
                {
                    title: "Create Computationcenter",

                    active: "1",
                },
            ],
            pageTitle: "Create Computationcenter",
        },
    },
    {
        path: "user/computation_centers",
        name: "user-computation_centers-index",
        component: () => import(/* webpackPrefetch: true */ "./Index.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/computation_centers",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Computationcenters",

                    active: "1",
                },
            ],
            pageTitle: "Computationcenters",
        },
    },
    {
        path: "user/computation_centers/:id/edit",
        name: "user-computation_centers-update-form",
        component: () => import(/* webpackPrefetch: true */ "./Update.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Update",
            basePath: "/user/computation_centers",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Computationcenters",

                    url: "/user/computation_centers",
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1",
                },
            ],
            pageTitle: "Update Computationcenter",
        },
    },
    {
        path: "user/computation_centers/:id",
        name: "user-computation_centers-detail",
        component: () => import(/* webpackPrefetch: true */ "./Detail.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/computation_centers",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Computationcenters",

                    url: "/user/computation_centers",
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1",
                },
            ],
            pageTitle: "Computationcenter Details",
        },
    },
];
