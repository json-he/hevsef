	
    Vue.component('test', {
        template: `<div>{{this.name}}</div>`,
         props: ['param'],
         data:function(){
            return{
                name:'这是一个组件'
            }
        }
    })
