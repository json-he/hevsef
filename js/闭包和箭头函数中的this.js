/*非严格模式*/

var name = 'window'

var obj1 = {
    name: '听风是风',
    fn1: function () {
        console.log(this.name)
    },
    fn2: () => console.log(this.name),
    fn3: function () {
        return function () {
            console.log(this.name)
        }
    },
    fn4: function () {
        return () => console.log(this.name)
    }
}
var obj2 = {
    name: '行星飞行'
};

obj1.fn1();//?   1
obj1.fn1.call(obj2);//?  2

obj1.fn2();//?  3
obj1.fn2.call(obj2);//? 4

obj1.fn3()();//? 5
obj1.fn3().call(obj2);//? 6
obj1.fn3.call(obj2)();//? 7

obj1.fn4()();//?  8
obj1.fn4().call(obj2);//? 9
obj1.fn4.call(obj2)();//? 10



// 答案就不统一贴了，大家可以自己输出，这里直接开始解析：

// 第一个输出听风是风，fn1调用前有一个obj1，this为隐式绑定指向obj1，因此读取到obj1的name属性。

// 第二个输出行星飞行，在介绍this的文章中已经提到，显式绑定优先级高于隐式绑定，所以此时的this指向obj2，读取了obj2的name属性。

// 第三个输出window，在介绍this一文中我们已经知道箭头函数并没有自己的this，它的this指向由上层执行上下文中的this决定，那为什么上层执行上下文是window呢？

// 我在介绍JavaScript执行上下文的文章中已经提到，JavaScript中的上下文分为全局执行上下文，函数执行上下文与eval执行上下文（eval不作考虑）。而不管是全局上下文或函数上下文的创建，大致都包含了确认this指向，创建词法环境，创建变量环境三步。



// 也就是说，this属于上下文中的一部分，很明显对象obj1并不是一个函数，它并没有权利创建自己的上下文，所以没有自己的this，那么它的外层是谁呢？当然是全局window啦，所以这里的this指向window。

// 第四个输出window，在this介绍一文中已经提到，箭头函数的this由外部环境决定，且一旦绑定无法通过call，apply或者bind再次改变箭头函数的this，所以这里虽然使用了call方法但依旧无法修改，所以this还是指向window。

// 第五个输出window，这个在闭包一文中已经提到了这个例子，obj1.fn3()()其实可以改写成这样：

// var fn = obj1.fn3();
// fn();
// 先执行了fn3方法，返回了一个闭包fn，而fn执行时本质上等同于window.fn()，属于this默认绑定，所以this指向全局对象。

// 第六个输出行星飞行，同样是先执行fn3返回一个闭包，但闭包执行时使用了call方法修改了this，此时指向obj2，这行代码等同于：

// var fn = obj1.fn3();
// fn.call(obj2);//显式绑定
// 第七个输出window，obj1.fn3.call(obj2)()修改一下其实是这样，fn被调用时本质上还是被window调用：

// var fn = obj1.fn3.call(obj2);
// window.fn();//默认绑定
// 第八个输出听风是风，fn4同样是返回一个闭包，只是这个闭包是一个箭头函数，所以箭头函数的this参考fn4的this即可，很明显此次调用fn4的this指向obj1。

// var fn = obj1.fn4();
// window.fn();//无法改变箭头函数this
// 第九个输出听风是风，改写代码其实是这样，显式绑定依旧无法改变箭头函数this：

// var fn = obj1.fn4();
// fn.call(obj2);//显式绑定依旧无法改变this
// 第十个输出行星飞行，前文已经说了，虽然无法直接改变箭头函数的this，但可以通过修改上层上下文的this达到间接修改箭头函数this的目的：

// var fn = obj1.fn4.call(obj2);//fn4的this此时指向obj2
// window.fn();//隐式绑定无法改变箭头函数this，this与fn4一样
// OK，题目一解析完毕，我们接着看题目二，其实没有太大区别，只是两个对象是以构造函数创建罢了。
