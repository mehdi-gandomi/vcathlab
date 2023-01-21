export default [
  {
    path: 'accesslevel/roles/create',
    name: 'access_level-roles-create-form',
    component: () => import('./Create.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'Roles',

          url: '/accesslevel/roles',
        },
        {
          title: 'Create Role',

          active: '1',
        },
      ],
      pageTitle: 'Create Role',
    },
  },
  {
    path: 'accesslevel/roles',
    name: 'access_level-roles-index',
    component: () => import('./Index.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'Roles',

          active: '1',
        },
      ],
      pageTitle: 'Roles',
    },
  },
  {
    path: 'accesslevel/roles/:id/edit',
    name: 'access_level-roles-update-form',
    component: () => import('./Update.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'Roles',

          url: '/accesslevel/roles',
        },
        {
          routeParam: 'id',

          resourceTitleField: 'title',

          active: '1',
        },
      ],
      pageTitle: 'Update Role',
    },
  },
  {
    path: 'accesslevel/roles/:id',
    name: 'access_level-roles-detail',
    component: () => import('./Detail.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'Roles',

          url: '/accesslevel/roles',
        },
        {
          routeParam: 'id',

          resourceTitleField: 'title',

          active: '1',
        },
      ],
      pageTitle: 'Role Details',
    },
  },

  {
    path: 'accesslevel/roles/:id/users',
    name: 'access_level-roles-users-grid',
    component: () => import('./Users.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'Roles',

          url: '/accesslevel/roles',
        },
        {
          routeParam: 'id',

          resourceTitleField: 'title',

          active: '1',
        },
      ],
      pageTitle: 'Role Users',
    },
  },
{
    path: 'accesslevel/roles/:id/users/assign',
    name: 'access_level-add-roles-users-grid',
    component: () => import('./OutUsers.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'Roles',

          url: '/accesslevel/roles',
        },
        {
          routeParam: 'id',

          resourceTitleField: 'title',

          active: '1',
        },
      ],
      pageTitle: 'Add Role Users',
    },
  },
  /* {
    path: 'accesslevel/roles/:id/users/assign',
    name: 'access_level-add-roles-users-grid',
    component: () => import('./AddUser.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'Roles',

          url: '/accesslevel/roles',
        },
        {
          routeParam: 'id',

          resourceTitleField: 'title',

          active: '1',
        },
      ],
      pageTitle: 'Add Role Users',
    },
  }, */
];
