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
                <label>课程编号：&nbsp;&nbsp;&nbsp;<{$schedule.c_id}></label>
            
                <label>课程名称：&nbsp;&nbsp;&nbsp;<{$schedule.course_name}></label>

                <label>学号：&nbsp;&nbsp;&nbsp;<{$schedule.s_id}></label>

                <label>姓名：&nbsp;&nbsp;&nbsp;<{$schedule.s_name}></label>

                <label>总课时：&nbsp;&nbsp;&nbsp;<{$schedule.course_hour}></label>
                <hr>
                <label>课程进度&nbsp;&nbsp;<span class="label label-important">总：<{$schedule.course_hour}></span></label>
                <input type="text" name="ytime" value="<{$schedule.ytime}>" class="input-xlarge" required="true" autofocus="true" >
                <label>作业进度&nbsp;&nbsp;<span class="label label-important">总：<{$schedule.course_task}></span></label>
                <input type="text" name="ytask" value="<{$schedule.ytask}>" class="input-xlarge" required="true" autofocus="true" >
                <label>缺勤次数</label>
                <input type="text" name="absence" value="<{$schedule.absence}>" class="input-xlarge" required="true" autofocus="true" >
                <label>课程状态</label>
                <select name="state"> 
                    <option value="待学习"<{if $schedule.state ==("待学习") }>selected="selected"<{/if}>>待学习</option>
                    <option value="学习"<{if $schedule.state ==("学习") }>selected="selected"<{/if}>>学习</option>
                    <option value="待考核"<{if $schedule.state ==("待考核") }>selected="selected"<{/if}>>待考核</option>
                    <option value="待评价"<{if $schedule.state ==("待评价") }>selected="selected"<{/if}>>待评价</option>
                    
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

</script>    
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>