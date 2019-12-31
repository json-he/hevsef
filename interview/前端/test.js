function foo(){
    var i = 0;
    return function(){
        return i++;
    }
}
var f1 = foo();
// var f2 = foo();
f1();
console.log(f1());

