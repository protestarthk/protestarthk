<script language="JavaScript">
<!-- hide script from old browser
var day = -1;
var hour = -1;
var minute = -1;
var second = -1;
var ENDTIME = new Date("<? echo $endtime;?>") ;
//終點時間，由資料庫取得。
var micro_oneday = 24 * 60 * 60 * 1000;
var micro_onehour = 60 * 60 * 1000;
var micro_oneminute = 60 * 1000;
var micro_second = 1000;

function clock(flag)
{
 if( flag==0 )
 {
  time = <? echo time()*1000;?>;
  //php傳進來的是一秒！要改成微秒。 
 }
 else if( flag==1 )
 { 
  time += 1000; 
 }
 
 micro_clockvalue = ENDTIME.getTime() - time; //前面的時間是微秒！

 day = Math.floor(micro_clockvalue / micro_oneday);
 micro_clockvalue -= day * micro_oneday;
 hour = Math.floor(micro_clockvalue / micro_onehour);
 micro_clockvalue -= hour * micro_onehour;
 minute = Math.floor(micro_clockvalue / micro_oneminute);
 micro_clockvalue -= minute * micro_oneminute;

 second = Math.floor(micro_clockvalue / micro_second);

  document.getElementById('countdown').innerHTML='<b>還有</b>&nbsp;'+day+'&nbsp;<b>天</b>&nbsp;'+hour+'&nbsp;<b>時</b>&nbsp;'+minute+'&nbsp;<b>分</b>&nbsp;'+second+'&nbsp;<b>秒</b>&nbsp;，<b>限時集購就要結束摟！</b>'; 
//輸出處理用innerHTML直接寫在div內！！

 setTimeout("clock(1)",1000);
} 
// end hiding -->
// clock(0);
</script>