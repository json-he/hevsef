let arr = [1,2,3,3,2,5]
let arr2 = arr.filter((item,index)=>{
    // indexof 返回在数组中首次出现的位子
    return arr.indexOf(item)===index
})

console.log(arr2)