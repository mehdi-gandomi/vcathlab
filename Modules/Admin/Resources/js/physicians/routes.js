export default [
    {
        path: "admin/physicians/print",
        name: "admin-physicians-print",
        component: () => import(/* webpackPrefetch: true */ "./Print.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Download",
            basePath: "/admin/physicians",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Physicians",

                    url: "/admin/physicians"
                },
                {
                    title: "Print",

                    active: "1"
                }
            ],
            pageTitle: "Print physicians"
        }
    },
    {
        path: "admin/physicians/create",
        name: "admin-physicians-create-form",
        component: () => import(/* webpackPrefetch: true */ "./Create.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Create",
            basePath: "/admin/physicians",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Physicians",

                    url: "/admin/physicians"
                },
                {
                    title: "Create Physician",

                    active: "1"
                }
            ],
            pageTitle: "Create Physician"
        }
    },
    {
        path: "admin/physicians",
        name: "admin-physicians-index",
        component: () => import(/* webpackPrefetch: true */ "./Index.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/admin/physicians",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Physicians",

                    active: "1"
                }
            ],
            pageTitle: "Physicians"
        }
    },
    {
        path: "admin/physicians/:id/edit",
        name: "admin-physicians-update-form",
        component: () => import(/* webpackPrefetch: true */ "./Update.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Update",
            basePath: "/admin/physicians",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Physicians",

                    url: "/admin/physicians"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Update Physician"
        }
    },
    {
        path: "admin/physicians/:id",
        name: "admin-physicians-detail",
        component: () => import(/* webpackPrefetch: true */ "./Detail.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/admin/physicians",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Physicians",

                    url: "/admin/physicians"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Physician Details"
        }
    }
];
