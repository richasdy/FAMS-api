import VueRouter from 'vue-router';

let routes=[
{
  path:'/',
  component:require('./components/Home')
},
{
  path:'/asset',
  component:require('./components/Asset')
},
{
  path:'/add-asset',
  component:require('./components/Add-Asset')
},
{
  path:'/location',
  component:require('./components/Location')
},
{
  path:'/type',
  component:require('./components/Type')
},
];

export default new VueRouter({
  routes
});
