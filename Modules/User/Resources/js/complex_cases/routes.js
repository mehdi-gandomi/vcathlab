export default [
    {
        path: "complex_cases/print",
        name: "complex_cases-print",
        component: () => import(/* webpackPreload: true */ "./Print.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Download",
            basePath: "/complex_cases",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Complexcases",

                    url: "/complex_cases"
                },
                {
                    title: "Print",

                    active: "1"
                }
            ],
            pageTitle: "Print complex_cases",


        }
    },
    {
        path: "complex_cases/create",
        name: "complex_cases-create-form",
        component: () => import(/* webpackPreload: true */ "./Create.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Create",
            basePath: "/complex_cases",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Complexcases",

                    url: "/complex_cases"
                },
                {
                    title: "Create Complexcase",

                    active: "1"
                }
            ],
            pageTitle: "Create Complexcase",


        }
    },
    {
        path: "complex_cases",
        name: "complex_cases-index",
        component: () => import(/* webpackPreload: true */ "./Index.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/complex_cases",
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


        }
    },
    {
        path: "complex_cases/:id/edit",
        name: "complex_cases-update-form",
        component: () => import(/* webpackPreload: true */ "./Update.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Update",
            basePath: "/complex_cases",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Complexcases",

                    url: "/complex_cases"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Update Complexcase",


        }
    },
    {
        path: "complex_cases/:id",
        name: "complex_cases-detail",
        component: () => import(/* webpackPreload: true */ "./Detail.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/complex_cases",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Complexcases",

                    url: "/complex_cases"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Complexcase Details",


        }
    }
];
