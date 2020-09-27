function countLeft(key, m = 3) {
    let begin
    if ( key === m ) {
        begin = key - m + 1
    }else {
        begin = Math.floor(key/m)*m + 1
    }
    if(begin === key ){
        return []
    } else {
        //从 begin 输出到 key-1
        let res = []
        for (let temp = begin;temp <= key-1;temp++){
            res.push(temp)
        }
        return res
    }
}

console.log(countLeft(7,7))
// console.log(countLeft(5,3))
