countTop(key, m = 3) {
    if (key - m <= 0) {
        return []
    }
    let res = this.countTop(key - m, m)
    res.push(key - m)
    return res
}

countLeft(key, m = 3) {
    // eslint-disable-next-line eqeqeq
    if (key === 1) {
        return []
    }
    if ((key - 1) % m === 0) {
        return []
    }
    let res = this.countLeft(key - 1)
    res.push(key - 1)
    return res
}

countTopPx(key, m = 3, gap = 10) {
    let arr = this.countTop(key, m)
    let res = 0
    arr.forEach((item)=>{
        res = res + this.state.list[item - 1].height
    })
    res += arr.length * gap
    return res
}

countLeftPx(key, m = 3, gap = 10) {
    let arr = this.countLeft(key, m)
    let res = 0
    arr.forEach((item)=>{
        res = res + this.state.list[item - 1].width
    })
    res += arr.length * gap
    return res
}

key 表示第几个

// todo 这个算法 的  countLeft 有点问题 有待修改

