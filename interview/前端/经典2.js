function side(arr) {
    arr[0] = arr[2];  //函数传参也不会改变 因为是形参
}

function a(a,b,c=3) {
    c=10;
    console.log(arguments);  //不会改变 arguments 的值
    side(arguments);
    return a+b+c;
}
var x = a(1,1,1)
console.log(x)