export default [
    {
        path: "admin/complex_case/comments/print",
        name: "admin-comments-print",
        component: () => import(/* webpackPrefetch: true */ "./Print.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Download",
            basePath: "/admin/complex_case/comments",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Comments",

                    url: "/admin/complex_case/comments"
                },
                {
                    title: "Print",

                    active: "1"
                }
            ],
            pageTitle: "Print comments"
        }
    },
    {
        path: "admin/complex_case/comments",
        name: "admin-comments-index",
        component: () => import(/* webpackPrefetch: true */ "./Index.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/admin/complex_case/comments",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Comments",

                    active: "1"
                }
            ],
            pageTitle: "Comments"
        }
    },
    {
        path: "admin/complex_case/comments/:id",
        name: "admin-comments-detail",
        component: () => import(/* webpackPrefetch: true */ "./Detail.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/admin/complex_case/comments",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Comments",

                    url: "/admin/complex_case/comments"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Comment Details"
        }
    }
];
