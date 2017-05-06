<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请填写选课资料</a></li>
    </ul>   
    
    <div id="myTabContent" class="tab-content">
          <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="">
                <label>课程编号</label>
                <input type="text" name="c_id" value="<{$_POST.c_id}>" class="input-xlarge" required="true" autofocus="true" onblur="check()" >
                <label>课程名称&nbsp;&nbsp;<span class="label label-important">自动填写项</span></label>
                <input type="text" name="course_name" value="" class="input-xlarge" required="true" autofocus="true" >
                <label>学号</label>
                <input type="text" name="s_id" value="<{$_POST.s_id}>" class="input-xlarge" required="true" autofocus="true" onblur="check1()" >
                <label>姓名&nbsp;&nbsp;<span class="label label-important">自动填写项</span></label>
                <input type="text" name="s_name" value="" class="input-xlarge" required="true" autofocus="true" >
                <label>总课时&nbsp;&nbsp;<span class="label label-important">自动填写项</span></label>
                <input type="text" name="course_hour" value="" class="input-xlarge" required="true" autofocus="true" >
                <label>已完成课时</label>
                <input type="text" name="ytime" value="<{$_POST.ytime}>" class="input-xlarge" required="true" autofocus="true" >
                <label>总作业次数&nbsp;&nbsp;<span class="label label-important">自动填写项</span></label>
                <input type="text" name="course_task" value="" class="input-xlarge" required="true" autofocus="true" >
                <label>已完成作业次数</label>
                <input type="text" name="ytask" value="<{$_POST.ytask}>" class="input-xlarge" required="true" autofocus="true" >
                <label>缺勤次数</label>
                <input type="text" name="absence" value="<{$_POST.absence}>" class="input-xlarge" required="true" autofocus="true" >
                <label>课程状态</label>
                <select name="state"> 
                    <option value="待学习">待学习</option>
                    <option value="学习">学习</option>
                    <option value="待考核">待考核</option>
                    <option value="待评价">待评价</option>
                    
                </select>
                <div class="btn-toolbar">
                    <button type="submit" class="btn btn-primary"><strong>提交</strong></button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$('#icon_select').click(function(){
$('#myModal').modal({
backdrop:true,
keyboard:true,
show:true
});
});

$('.icon').click(function(){
var obj=$(this);
$('#icon_preview').removeClass().addClass(obj.text());
$('#icon_id').val(obj.text());
$('#myModal').modal('toggle');
});
function check(){
        var id = $("input[type='text'][name='c_id']").val();
        //$("input[type='text'][name='course_id']").val("没有此课程编号");
        try{
            xmlhttp = new window.XMLHttpRequest();
            xmlhttp.open("GET","aa.php?id="+id,true);

            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                    var str = xmlhttp.responseText;
                    //alert(id);
                    if(str == ""){
                        $("input[type='text'][name='c_id']").val("没有此课程编号");
                       
                        return;
                    }else if(str == "e"){
                        return;
                    }
                    var arr = str.split(",");
                    $("input[type='text'][name='course_name']").val(arr[0]);
                    $("input[type='text'][name='course_hour']").val(arr[1]);
                    $("input[type='text'][name='course_task']").val(arr[2]);
                }
            }
            xmlhttp.send();
        }catch(e){
            xmlhttp = new ActiveXObject("MICROSOFT.X");
        }

    }
    function check1(){
        var id = $("input[type='text'][name='s_id']").val();
        //$("input[type='text'][name='course_id']").val("没有此课程编号");
        try{
            xmlhttp = new window.XMLHttpRequest();
            xmlhttp.open("GET","cc.php?id="+id,true);

            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                    var str = xmlhttp.responseText;
                    //alert(id);
                    if(str == ""){
                        $("input[type='text'][name='s_id']").val("没有此学号");
                       
                        return;
                    }else if(str == "e"){
                        return;
                    }
                    
                    $("input[type='text'][name='s_name']").val(str);
                    
                }
            }
            xmlhttp.send();
        }catch(e){
            xmlhttp = new ActiveXObject("MICROSOFT.X");
        }

    }
function check2(){
        var id = $("input[type='text'][name='c_id']").val();
        //$("input[type='text'][name='c_id']").val("没有此课程编号");
        try{
            xmlhttp = new window.XMLHttpRequest();
            xmlhttp.open("GET","dd.php?id="+id,true);

            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                    var str = xmlhttp.responseText;
                    //alert(id);
                    if(str == ""){
                        $("input[type='text'][name='c_id']").val("没有此课程编号");
                       
                        return;
                    }else if(str == "e"){
                        return;
                    }
                    
                    $("input[type='text'][name='course_hour']").val(str);
                   
                    
                }
            }
            xmlhttp.send();
        }catch(e){
            xmlhttp = new ActiveXObject("MICROSOFT.X");
        }

    }
</script>    
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>