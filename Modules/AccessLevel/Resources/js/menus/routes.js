export default [
  {
    path: 'accesslevel/menus/create',
    name: 'access_level-menus-create-form',
    component: () => import('./Create.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'Menus',

          url: '/accesslevel/menus',
        },
        {
          title: 'Create Menu',

          active: '1',
        },
      ],
      pageTitle: 'Create Menu',
    },
  },
  {
    path: 'accesslevel/menus',
    name: 'access_level-menus-index',
    component: () => import('./Index.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'Menus',

          active: '1',
        },
      ],
      pageTitle: 'Menus',
    },
  },
  {
    path: 'accesslevel/menus/:id/edit',
    name: 'access_level-menus-update-form',
    component: () => import('./Update.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'Menus',

          url: '/accesslevel/menus',
        },
        {
          routeParam: 'id',

          resourceTitleField: 'title',

          active: '1',
        },
      ],
      pageTitle: 'Update Menu',
    },
  },
  {
    path: 'accesslevel/menus/:id',
    name: 'access_level-menus-detail',
    component: () => import('./Detail.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'Menus',

          url: '/accesslevel/menus',
        },
        {
          routeParam: 'id',

          resourceTitleField: 'title',

          active: '1',
        },
      ],
      pageTitle: 'Menu Details',
    },
  },
];
