export default [
    {
        path: "user/complex_case_categories/print",
        name: "user-complex_case_categories-print",
        component: () => /* webpackPreload: true */ import("./Print.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Complexcasecategories",

                    url: "/user/complex_case_categories"
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
        path: "user/complex_case_categories/create",
        name: "user-complex_case_categories-create-form",
        component: () => /* webpackPreload: true */ import("./Create.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Complexcasecategories",

                    url: "/user/complex_case_categories"
                },
                {
                    title: "Create Complexcasecategory",

                    active: "1"
                }
            ],
            pageTitle: "Create Complexcasecategory"
        }
    },
    {
        path: "user/complex_case_categories",
        name: "user-complex_case_categories-index",
        component: () => /* webpackPreload: true */ import("./Index.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Complexcasecategories",

                    active: "1"
                }
            ],
            pageTitle: "Complexcasecategories"
        }
    },
    {
        path: "user/complex_case_categories/:id/edit",
        name: "user-complex_case_categories-update-form",
        component: () => /* webpackPreload: true */ import("./Update.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Complexcasecategories",

                    url: "/user/complex_case_categories"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Update Complexcasecategory"
        }
    },
    {
        path: "user/complex_case_categories/:id",
        name: "user-complex_case_categories-detail",
        component: () => /* webpackPreload: true */ import("./Detail.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Complexcasecategories",

                    url: "/user/complex_case_categories"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Complexcasecategory Details"
        }
    }
];
