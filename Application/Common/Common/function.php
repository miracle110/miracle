<?php
function testing()
{
    $member=M('member');
    for($i=0;;$i++)
    {
        $id=rand(10000,999999);
        $where['account']=$id;
        $m=$member->where($where)->find();
        if(!$m)
        {
            break;
        }
    }
    return $id;
}