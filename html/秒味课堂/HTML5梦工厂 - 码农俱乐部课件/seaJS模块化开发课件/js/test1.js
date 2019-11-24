// JavaScript Document

define(function(require,exports,module){ //参数写法不变

	//exports : 对外的接口
	//require : 依赖的接口
	
	//require('./test2.js');  //如果地址是一个模块的话，那么require的返回值就是模块中的exports


	function tab(){
		alert( require('./test2.js').a );
	}
	
	exports.tab = tab;

});

