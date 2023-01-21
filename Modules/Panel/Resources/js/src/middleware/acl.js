export default function acl (to, from, next,router){
    // if(to.meta.isCrud){
    //     const permissions=window.config.permissions;
    //     const menuId=to.meta.menuId;
    //     if(menuId){
    //         const permission=permissions[menuId];
    //         if(!permission) router.push({ name: 'page-not-authorized' });
    //         const permissionMap={
    //             Create:0,
    //             Update:1,
    //             Delete:2,
    //             View:3,
    //             Download:4,
    //         };
    //         if(to.meta.crudOperation){
    //             if(!permission[permissionMap[to.meta.crudOperation]]) router.push({ name: 'page-not-authorized' });
    //         }
    //     }
    // }
    return next()
}
