<template>
  <div class="modal-example">
      <div class="modal">
        <div class="modal-header">
          <h4>{{title}}</h4>
        </div>
        <div class="modal-content">
          <div>
            在这里添加内容
          </div>
        </div>
        <div class="modal-footer">
          <input class="btn" type="button" :value="okValue" @click="okClick"  />
          <input class="btn" type="button" value="取消" />
        </div>
      </div>
  </div>
</template>
<script>
  export default {
		//props:['title','okValue']
		props:{
			title:{
				type: String,
				default: '这是一个标题'
			},
			okValue: {
				type: String,
				default: '确定'
			},
			appShow: {
				type: Boolean,
				default: false
			},
			isRed: {
				type: Boolean,
				default: false
			}
		},
		methods:{
			okClick(){
				console.log('点击了ok按钮')
				//alert(1);
				// 通知外面，点击了这个按钮
				// 发布一个自定义的事件
				//this.title = '改变了'

				// show设置为false

				this.$emit('ok-click');

				// 改变同步的某个属性值，app-show.sync 
				this.$emit('update:appShow',false)
				this.$emit('update:isRed',true)
			}
		}
	}
</script>
<style scoped>
p,h4{
	margin:0;
}
.modal{
	width: 500px;
	background-color: #fff;
	border: 1px solid rgba(0,0,0,.2);
	border-radius: 6px;
	box-shadow: 0 3px 9px rgba(0,0,0,.5);
	-position: absolute;
	left: 50%;
	top: 50%;
	-transform: translate(-50%,-50%);
	z-index: 111;
}
.modal-header {
	padding: 15px;
	border-bottom: 1px solid #e5e5e5;
}
.modal-content div {
	padding: 20px;
}
.modal-footer {
	padding: 15px;
	text-align: right;
	border-top: 1px solid #e5e5e5;
}
.btn {
	padding: 5px 15px;

}
</style>

