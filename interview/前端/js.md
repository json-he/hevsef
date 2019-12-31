#js中null和undefined区别
    null是空对象引用，引用指向为空
    undefined是只定义了引用
    
    typeof null：”object”
    typeof undefined ： “undefined”
    
    例子：
        var oValue;  
        alert(oValue == undefined); //output "true"  
        
        alert(null == document.getElementById('notExistElement'));   //true
        
        alert(typeof undefined); //output "undefined"  
        alert(typeof null); //output "object"  
        

#js this 是谁的见knowledge

#将一下 prototype 是什么东西，原型链的理解，什么时候用 prototype
使用prototype的好处是不会产生额外的内存，所有实例化后的对象都会从原型上继承这个属性或方法。当一个子类需要拥有父类的某些属性或方法，该属性或方法可以覆盖，又可以添加自己的属性和方法，这个操作不影响父类，这个时候使用prototype。

#6. 怎样避免全局变量污染?ES6箭头函数和ES5普通函数一样吗?
ES6箭头函数 this 是固定的是他当前环境
ES5 的this 是调用它的人

#ES5严格模式的作用
```
题目一：
   (function(){
       var a = b = 10;
   })()
   console.log(b); // 10
   解析：因为b在这里是个全局变量
   
   
   题目二：
   (function(){
     'use strict';
       var a = b = 10;
   })()
   console.log(b); // 错误，此函数定义的时候就是错误的，因为它立即执行了
   解析：因为使用了严格模式，导致b未声明就使用了，于是会报错误
   b is not defined
```
#理解闭包吗?请讲一讲闭包在实际开发中的作用;闭包建议频繁使用吗?
闭包就是函数。
#ajax 跨域有哪些方法，jsonp 的原理是什么，如果页面编码和被请求的资源编码不一致如何处理?

#Object.assign
    es6 的方法
    Object.assign
    方法用于对象的合并，将源对象（source）的所有可枚举属性，复制到目标对象
    如果目标对象与源对象有同名属性，或多个源对象有同名属性，则后面的属性会覆盖前面的属性。
    方法的第一个参数是目标对象，后面的参数都是源对象。
