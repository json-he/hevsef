testa(); // 打印出testa

testb();  // 报错：提示undefined is not a function

console.log(testc); //打印出testc

    function testa() {

        console.log("testa");

    }
    var testb = function() {

        console.log("tesb");
    
    };
    var testc = "testc";
