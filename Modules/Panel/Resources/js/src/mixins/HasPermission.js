
export default {

    methods: {
        can(menuId,operation){
            if(!this.permissions) return false;
            const permission=this.permissions[menuId];
            if(!permission) return false;
            const permissionMap={
                Create:0,
                Update:1,
                Delete:2,
                View:3,
                Download:4,
            };
            if(!permission[permissionMap[operation]]) return false;
            return true;
        }
    },
    computed:{
        permissions(){
            return window.config.permissions;
        }
    },
    mounted() {

    },
}
