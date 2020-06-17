/*非严格模式*/
var name = 'window'

function Person(name) {
  this.name = name;
  this.fn1 = function () {
    console.log(this.name);
  };
  this.fn2 = () => console.log(this.name);
  this.fn3 = function () {
    return function () {
      console.log(this.name)
    };
  };
  this.fn4 = function () {
    return () => console.log(this.name);
  };
};

var obj1 = new Person('听风是风');
console.dir(obj1);
var obj2 = new Person('行星飞行');

obj1.fn1();
obj1.fn1.call(obj2);

obj1.fn2();
obj1.fn2.call(obj2);

obj1.fn3()();
obj1.fn3().call(obj2);
obj1.fn3.call(obj2)();

obj1.fn4()();
obj1.fn4().call(obj2);
obj1.fn4.call(obj2)();


// 见这个  https://www.cnblogs.com/echolun/p/11969938.html
