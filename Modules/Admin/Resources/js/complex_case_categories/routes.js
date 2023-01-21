export default [
    {
        path: "admin/complex_case_categories/print",
        name: "admin-complex_case_categories-print",
        component: () => /* webpackPrefetch: true */ import("./Print.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "categories",

                    url: "/admin/complex_case_categories"
                },
                {
                    title: "Print",

                    active: "1"
                }
            ],
            pageTitle: "Print complex_case_categories"
        }
    },
    {
        path: "admin/complex_case_categories/create",
        name: "admin-complex_case_categories-create-form",
        component: () => /* webpackPrefetch: true */ import("./Create.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "categories",

                    url: "/admin/complex_case_categories"
                },
                {
                    title: "Create category",

                    active: "1"
                }
            ],
            pageTitle: "Create category"
        }
    },
    {
        path: "admin/complex_case_categories",
        name: "admin-complex_case_categories-index",
        component: () => /* webpackPrefetch: true */ import("./Index.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "categories",

                    active: "1"
                }
            ],
            pageTitle: "categories"
        }
    },
    {
        path: "admin/complex_case_categories/:id/edit",
        name: "admin-complex_case_categories-update-form",
        component: () => /* webpackPrefetch: true */ import("./Update.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "categories",

                    url: "/admin/complex_case_categories"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Update category"
        }
    },
    {
        path: "admin/complex_case_categories/:id",
        name: "admin-complex_case_categories-detail",
        component: () => /* webpackPrefetch: true */ import("./Detail.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "categories",

                    url: "/admin/complex_case_categories"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle:  "Category Details"
        }
    }
];
