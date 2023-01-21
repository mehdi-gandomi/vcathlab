export default [
    {
        path: "admin/complex_cases/print",
        name: "admin-complex_cases-print",
        component: () => import(/* webpackPrefetch: true */ "./Print.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Download",
            basePath: "/admin/complex_cases",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Complexcases",

                    url: "/admin/complex_cases"
                },
                {
                    title: "Print",

                    active: "1"
                }
            ],
            pageTitle: "Print complex_cases",
            menuId: "17"
        }
    },
    {
        path: "admin/complex_cases/create",
        name: "admin-complex_cases-create-form",
        component: () => import(/* webpackPrefetch: true */ "./Create.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Create",
            basePath: "/admin/complex_cases",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Complexcases",

                    url: "/admin/complex_cases"
                },
                {
                    title: "Create Complexcase",

                    active: "1"
                }
            ],
            pageTitle: "Create Complexcase",
            menuId: "17"
        }
    },
    {
        path: "admin/complex_cases",
        name: "admin-complex_cases-index",
        component: () => import(/* webpackPrefetch: true */ "./Index.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/admin/complex_cases",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Complexcases",

                    active: "1"
                }
            ],
            pageTitle: "Complexcases",
            menuId: "17"
        }
    },
    {
        path: "admin/complex_cases/:id/edit",
        name: "admin-complex_cases-update-form",
        component: () => import(/* webpackPrefetch: true */ "./Update.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Update",
            basePath: "/admin/complex_cases",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Complexcases",

                    url: "/admin/complex_cases"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Update Complexcase",
            menuId: "17"
        }
    },
    {
        path: "admin/complex_cases/:id",
        name: "admin-complex_cases-detail",
        component: () => import(/* webpackPrefetch: true */ "./Detail.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/admin/complex_cases",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Complexcases",

                    url: "/admin/complex_cases"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Complexcase Details",
            menuId: "17"
        }
    }
];
