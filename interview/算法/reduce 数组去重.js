let arr = [1,2,3,1,4]
let res = arr.reduce((ar,item)=>{
    if(!ar.includes(item)){
        ar.push(item);
    }
    return ar
},[])

console.log(res)