<?php
namespace app\student\controller;
use think\Controller;
class Studentvaluablesinfo extends Controller
{
    public function index(){
        return $this->fetch('studentvaluablesinfo/index');
    }
    /*****************************************
     * 作者：王波文
     * 时间：2016年12月17日
     *方法：贵重物品登记
     *****************************************/

    public function ValuablesRegistration($StudentNo,$Valuables){
        $Uid=db('studentinfo')->query("select id from studentinfo where StudentNo='$StudentNo'");
        $datet=date('Y-m-d H:i:s',time());
        $Valuablesinfo=db('valuablesinfo')->execute("insert into valuablesinfo (Uid,ValuablesName,RegistrationTime) VALUES ({$Uid[0]['id']},'$Valuables','$datet')");
        if($Valuablesinfo){
            return info('登记成功！',1);
        }else{
            return info('登记失败！请重试一次！',0);
        }

    }
}

