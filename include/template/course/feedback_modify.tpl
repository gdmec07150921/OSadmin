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
                <input type="hidden" name="feedback_no" value="<{$feedback.feedback_no}>">
                <label>课程编号：&nbsp;&nbsp;&nbsp;<{$feedback.course_id}></label>
                               
                <label>课程名称： &nbsp;&nbsp;&nbsp;<{$feedback.course_name}></label>
                
                <label>反馈人学号：&nbsp;&nbsp;&nbsp;<{$feedback.student_id}></label>

                <label>反馈内容</label>
                <p><{$feedback.feedback_name}></p>
                <hr>
                <label>回复内容</label>
                <textarea name="feedback_answer" value="<{$_POST.feedback_answer}>" class="input-xlarge" required="true" autofocus="true"></textarea>
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