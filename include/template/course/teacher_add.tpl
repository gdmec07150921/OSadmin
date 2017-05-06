<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<{$osadmin_action_alert}>
<{$osadmin_quick_note}>
    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请填学生程资料</a></li>
    </ul>   
    
    <div id="myTabContent" class="tab-content">
          <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="" onsubmit="return check()" name="from1">
                <label>工号&nbsp;&nbsp;<span class="label label-important" id="div1"></span></label>
                <input type="text" name="t_id" value="<{$_POST.t_id}>" class="input-xlarge" required="true" autofocus="true" onblur="check1()" >
                <label>姓名</label>
                <input type="text" name="t_name" value="<{$_POST.t_name}>" class="input-xlarge" required="true" autofocus="true" >
                <label>头像</label>
                <input type="text" name="t_url" value="<{$_POST.t_url}>" class="input-xlarge" required="true" autofocus="true"  placeholder="images/TeacherImages/">
                <label>性别</label>
                <select name="t_sex"> 
                    <option value="男">男</option>
                    <option value="女">女</option>
                </select>
                <label>简介</label>
                <textarea name="t_introduce" value="<{$_POST.t_introduce}>" class="input-xlarge" required="true" autofocus="true"></textarea>
                
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
        if(check1()){
            return true;
        }else{
            return false;
        }
    }
    function check1(){

            var reg=/^\d{4}$/;
            var div1= document.getElementById("div1");
           
            var id = $("input[type='text'][name='t_id']").val();
            if (!reg.test(id)) {
                return false;
                div1.innerHTML="工号必须是4个数字";
            }else{
                div1.innerHTML="";
                return true;
            }
        }
       
</script>    
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>