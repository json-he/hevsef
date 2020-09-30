(function () {
    console.log(1)
    function a() {
        return
    }
    a()
    console.log(2)
    for(let i in [1,2,3]){
        return
    }
    console.log(3)
})()