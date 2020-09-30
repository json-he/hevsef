<?php
// 利用php面向对象思想，栈的属性有top、最大存储数、和存储容器（这里利用了php数组）。
// 代码如下：实现了入栈、出栈、遍历栈的几个方法：
class Stack{
    const MAXSIZE = 4;// 栈最大容量
    private $top = -1;
    private $stack = array();// 利用数组存储数据

    public function __construct(){
        $this->stack = array();
    }

    // 入栈
    public function push($ele){
        if ($this->top >= self::MAXSIZE-1){
            echo 'stack is full...';
            return false;
        }
        $this->stack[++$this->top] = $ele;// 此处必须是++i，先计算再使用
    }

    // 出栈，返回出栈元素
    public function pop(){
        if ($this->top == -1){
            echo 'stack is empty...';
            return false;
        }
        $ele = $this->stack[$this->top];
        unset($this->stack[$this->top--]);// 此处必须是i--，先使用再计算（注意出栈和入栈的区别）
        return $ele;
    }

    // 遍历栈
    public function show(){
        if ($this->top == -1){
            echo 'stack is empty...';
            return false;
        }
        for($i=$this->top; $i>-1; $i--){
            echo $this->stack[$i].'<br/>';
        }
    }

}

$stack = new Stack;
$stack->push(1);
$stack->push(2);
$stack->push(3);
$stack->push(4);

//print_r($stack);
$stack->show();


$a = $stack->pop();
$a = $stack->pop();
$a = $stack->pop();

$stack->show();
