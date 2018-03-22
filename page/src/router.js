const routers = [
    {
        path: '/',
        meta: {
            title: ''
        },
        component: (resolve) => require(['./views/index.vue'], resolve)
    },{
        path:'/xiao',
        meta:{
            title:'owlet',
        },
        component:(resolve) => require(['./views/xiao.vue'],resolve)
    }
];
export default routers;