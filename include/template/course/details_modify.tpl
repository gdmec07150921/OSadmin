<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请填写课程资料</a></li>
    </ul>   
    
    <div id="myTabContent" class="tab-content">
          <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="">
                <label>课程编号:&nbsp;&nbsp;&nbsp;<{$details.course_id}></label>
                <label>课程名称:&nbsp;&nbsp;&nbsp;<{$details.course_name}></label>
                <hr>  
                <label>老师编号</label>
                <input type="text" name="t_id" value="<{$details.t_id}>" class="input-xlarge" required="true" autofocus="true" onblur="check1()">
                <label>任课老师  &nbsp;&nbsp;<span class="label label-important">自动填写项</span></label>
                <input type="text" name="teacher" value="<{$details.t_name}>" class="input-xlarge" required="true" autofocus="true" >

                <label>课程图片</label>
                <input type="text" name="course_url" value="<{$details.course_url}>" class="input-xlarge" required="true" autofocus="true" placeholder="images/CourseImages/">&nbsp;&nbsp;&nbsp;原图：<img src="<{$img}><{$details.course_url}>" alt=""width='50xp';>
                <label>课时</label>
                <input type="text" name="course_hour" value="<{$details.course_hour}>" class="input-xlarge" required="true" autofocus="true" >
                <label>适合人群</label>
                <input type="text" name="people" value="<{$details.people}>" class="input-xlarge" required="true" autofocus="true" >
                <label>上课地点</label>
                <input type="text" name="course_place" value="<{$details.course_place}>" class="input-xlarge" required="true" autofocus="true" >
                <label>课程安排</label>
                <input type="text" name="course_time" value="<{$details.course_time}>" class="input-xlarge" required="true" autofocus="true" >
                <label>开课时间</label>
                <input type="date" name="course_open" value="<{$details.course_open}>" class="input-xlarge" required="true" autofocus="true" >
                <label>课程概述</label>
                <input type="text" name="course_summary" value="<{$details.course_summary}>" class="input-xlarge" required="true" autofocus="true" >
                <label>课程星数</label>
                <input type="text" name="course_star" value="<{$details.course_star}>" class="input-xlarge" required="true" autofocus="true" >
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
function check1(){
        var id = $("input[type='text'][name='t_id']").val();
        try{
            xmlhttp = new window.XMLHttpRequest();
            xmlhttp.open("GET","bb.php?id="+id,true);
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                    var str = xmlhttp.responseText;
                    if(str == ""){
                        alert("请正确输入老师编号");
                        return;
                    }else if(str == "e"){
                        return;
                    }
                    //var arr = str.split(",");
                    //alert(str);
                   $("input[type='text'][name='teacher']").val(str);
                    //$("select[name='course_state'] option[value='"+arr[1]+"']").attr("selected",true);
                    
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