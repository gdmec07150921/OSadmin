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
                <label>课程编号</label>
                <input type="text" name="course_id" value="<{$_POST.course_id}>" class="input-xlarge" required="true" autofocus="true" >
                <label>课程名称</label>
                <input type="text" name="course_name" value="<{$_POST.course_name}>" class="input-xlarge" required="true" autofocus="true" >
                <label>课程人数</label>
                <input type="text" name="course_num" value="<{$_POST.course_num}>" class="input-xlarge" required="true" autofocus="true" >
                <label>已选人数</label>
                <input type="text" name="course_num1" value="<{$_POST.course_num1}>" class="input-xlarge" required="true" autofocus="true" >
                <label>剩余人数</label>
                <input type="text" name="course_num2" value="<{$_POST.course_num2}>" class="input-xlarge" required="true" autofocus="true" >
                <label>课程状态</label>
                <select name="course_state"> 
                    <option value="在选">在选</option>
                    <option value="已满">已满</option>
                    <option value="未开">未开</option>
                    <option value="正常">正常</option>
                    <option value="停课">停课</option>
                </select>
                <label>课程地点</label>
                <select name="course_where"> 
                    <option value="教室">教室</option>
                    <option value="在线">在线</option>
                </select>
                <label>喜爱人数</label>
                <input type="text" name="course_like" value="<{$_POST.course_like}>" class="input-xlarge" required="true" autofocus="true" >
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