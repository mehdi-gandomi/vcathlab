export default [
  {
    path: 'accesslevel/subsystems/create',
    name: 'access_level-subsystems-create-form',
    component: () => import('./Create.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'SubSystems',

          url: '/accesslevel/subsystems',
        },
        {
          title: 'Create SubSystem',

          active: '1',
        },
      ],
      pageTitle: 'Create SubSystem',
    },
  },
  {
    path: 'accesslevel/subsystems',
    name: 'access_level-subsystems-index',
    component: () => import('./Index.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'SubSystems',

          active: '1',
        },
      ],
      pageTitle: 'SubSystems',
    },
  },
  {
    path: 'accesslevel/subsystems/:id/edit',
    name: 'access_level-subsystems-update-form',
    component: () => import('./Update.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'SubSystems',

          url: '/accesslevel/subsystems',
        },
        {
          routeParam: 'id',

          resourceTitleField: 'title',

          active: '1',
        },
      ],
      pageTitle: 'Update SubSystem',
    },
  },
  {
    path: 'accesslevel/subsystems/:id',
    name: 'access_level-subsystems-detail',
    component: () => import('./Detail.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'SubSystems',

          url: '/accesslevel/subsystems',
        },
        {
          routeParam: 'id',

          resourceTitleField: 'title',

          active: '1',
        },
      ],
      pageTitle: 'SubSystem Details',
    },
  },
];
