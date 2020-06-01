<?php
// 也有一个head 的null 来搞
        class Hero
        {
            public $pre=null;
            public $no;
            public $name;
            public $next=null;
            
            public function __construct($no='',$name='')
            {
                $this->no=$no;
                $this->name=$name;
            }
            
            static public function addHero($head,$hero)
            {
                $cur = $head;
                $isExist=false;
                //判断目前这个链表是否为空
                if($cur->next==null)
                {
                    $cur->next=$hero;
                    $hero->pre=$cur;
                }
                else
                {
                    //如果不是空节点，则安排名来添加
                    //找到添加的位置
                    
                    while($cur->next!=null)
                    {
                        if($cur->next->no > $hero->no)
                        {
                            break;
                        }
                        else if($cur->next->no == $hero->no)
                        {
                            $isExist=true;
                            echo "<br>不能添加相同的编号";
                        }
                        $cur=$cur->next;
                    }
                    if(!$isExist)
                    {
                        if($cur->next!=null)
                        {
                            $hero->next=$cur->next;
                        }
                        $hero->pre=$cur;
                        if($cur->next!=null)
                        {
                            $hero->next->pre=$hero;
                        }
                        $cur->next=$hero;                    
                    }
                }
            }
            
            //遍历
            static public function showHero($head)
            {
                $cur=$head;
                while($cur->next!=null)
                {
                    echo "<br>编号：".$cur->next->no."名字：".$cur->next->name;
                    $cur=$cur->next;
                }
            }
            
            static public function delHero($head,$herono)
            {
                $cur=$head;
                $isFind=false;
                while($cur!=null)
                {
                    if($cur->no==$herono)
                    {
                        $isFind=true;
                        break;
                    }
                    //继续找
                    $cur=$cur->next;
                }
                if($isFind)
                {
                    if($cur->next!=null)
                    {
                        $cur->next_pre=$cur->pre;
                    }
                    $cur->pre->next=$cur->next;
                }
                else
                {
                    echo "<br>没有找到目标";
                }                
            }
        }

        $head = new Hero();
        $hero1 = new Hero(1,'1111');
        $hero3 = new Hero(3,'3333');
        $hero2 = new Hero(2,'2222');
        Hero::addHero($head,$hero1);
        Hero::addHero($head,$hero3);
        Hero::addHero($head,$hero2);
        Hero::showHero($head);
        Hero::delHero($head,2);
        Hero::showHero($head);
?>
