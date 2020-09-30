let deepcope = (newobj,oldobj)=>{
    for (let k in oldobj){
        let value = oldobj[k]

        if(value instanceof Array){
            let temp1 = []
            deepcope(temp1,oldobj[k])
            newobj[k] = temp1
        }else if(value instanceof Object){
            let temp2 = {}
            deepcope(temp2,oldobj[k])
            newobj[k] = temp2
        }else{
            newobj[k] = oldobj[k]
        }
    }
}

// let obj1 = {
//     'name':'222',
//     "woww":"fdsfdas",
//     "text":{
//         '222':222
//     }
// }

let obj1 = [1,2,"222"]

let obj2 = [];

deepcope(obj2,obj1)

console.log(obj2)