export default [
    {
        path: "admin/users/print",
        name: "admin-users-print",
        component: () => /* webpackPrefetch: true */ import("./Print.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Users",

                    url: "/admin/users",
                },
                {
                    title: "Print",

                    active: "1",
                },
            ],
            pageTitle: "Print users",
        },
    },
    {
        path: "admin/users/create",
        name: "admin-users-create-form",
        component: () => /* webpackPrefetch: true */ import("./Create.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Users",

                    url: "/admin/users",
                },
                {
                    title: "Create User",

                    active: "1",
                },
            ],
            pageTitle: "Create User",
        },
    },
    {
        path: "admin/users",
        name: "admin-users-index",
        component: () => /* webpackPrefetch: true */ import("./Index.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Users",

                    active: "1",
                },
            ],
            pageTitle: "Users",
        },
    },
    {
        path: "admin/users/:id/edit",
        name: "admin-users-update-form",
        component: () => /* webpackPrefetch: true */ import("./Update.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Users",

                    url: "/admin/users",
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1",
                },
            ],
            pageTitle: "Update User",
        },
    },
    {
        path: "admin/users/:id",
        name: "admin-users-detail",
        component: () => /* webpackPrefetch: true */ import("./Detail.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/",
                },
                {
                    title: "Users",

                    url: "/admin/users",
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1",
                },
            ],
            pageTitle: "User Details",
        },
    },
];
