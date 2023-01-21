export default [
    {
        path: "user/mace_assesments/print",
        name: "user-mace_assesments-print",
        component: () => import(/* webpackPrefetch: true */ "./Print.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Download",
            basePath: "/user/mace_assesments",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Maceassesments",

                    url: "/user/mace_assesments"
                },
                {
                    title: "Print",

                    active: "1"
                }
            ],
            pageTitle: "Print mace_assesments"
        }
    },
    {
        path: "user/mace_assesments/create",
        name: "user-mace_assesments-create-form",
        component: () => import(/* webpackPrefetch: true */ "./Create.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Create",
            basePath: "/user/mace_assesments",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Maceassesments",

                    url: "/user/mace_assesments"
                },
                {
                    title: "Create Maceassesment",

                    active: "1"
                }
            ],
            pageTitle: "Create Maceassesment"
        }
    },
    {
        path: "user/mace_assesments",
        name: "user-mace_assesments-index",
        component: () => import(/* webpackPrefetch: true */ "./Index.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/mace_assesments",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Maceassesments",

                    active: "1"
                }
            ],
            pageTitle: "Maceassesments"
        }
    },
    {
        path: "user/mace_assesments/:id/edit",
        name: "user-mace_assesments-update-form",
        component: () => import(/* webpackPrefetch: true */ "./Update.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Update",
            basePath: "/user/mace_assesments",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Maceassesments",

                    url: "/user/mace_assesments"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Update Maceassesment"
        }
    },
    {
        path: "user/mace_assesments/:id",
        name: "user-mace_assesments-detail",
        component: () => import(/* webpackPrefetch: true */ "./Detail.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/mace_assesments",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Maceassesments",

                    url: "/user/mace_assesments"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Maceassesment Details"
        }
    }
];
