<?php
    class Node {

        /**
         * 数据
         */
        public $data = "";

        /**
         * 指针
         */
        public $next = null;

        /**
         * 构造方法
         */
        public function __construct($data,$next=null)
        {
            $this->data = $data;
            $this->next = $next;    
        }
    }

    //原结构的 head 就是一个虚拟的节点 值为null 指向了第一个真正链表的第一个值
    class SingleLinkedLIst {
        public $head;

        public $length = 0;

        public function __construct()
        {
            $this->head = new Node(null);
        }

        //尾部插入数据
        public function insert($data)
        {
            $current = $this->head;
            while($current->next!==null){
                $current = $current->next;
            }
            $current->next = new Node($data);
            $this->length++;
            return $this;
        }

        //头部插入数据
        public function headInsert($data)
        {
            $this->head->next = new Node($data,$this->head->next);
            $this->length++;
            return $this;
        }

        //更新一个元素 $i=0,表示第一个
        public function update($index,$newData)
        {
            if($this->length ===0){
                return false;
            }
            $i = 0;
            $current = $this->head->next;
            while($i!=$index){
                $current = $current->next;
                $i++;
            }
            $current->data = $newData;
            return $this;
        }

        //弹出第一个元素
        public function pop()
        {
            if($this->length ===0){
                return false;
            }
            $data = $this->head->next->data;
            $this->head->next = $this->head->next->next;
            $this->length;
            return $data;
        }

        //获取指定个元素
        public function get($index)
        {
            if($this->length===0) {
                return false;
            }
            $i = 0;
            $current = $this->head->next;
            while($i!=$index){
                $current = $current->next;
                $i++;
            }
            return $current->data;
        }

        //删除指定元素
        public function delete($index){
            if($index <0){
                
            }
        }
    


    }
