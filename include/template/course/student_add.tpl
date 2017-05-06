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
                <label>学号&nbsp;&nbsp;<span class="label label-important" id="div1"></span></label>
                <input type="text" name="s_id" value="<{$_POST.s_id}>" class="input-xlarge" required="true" autofocus="true" onblur="check1()" >
                <label>姓名</label>
                <input type="text" name="s_name" value="<{$_POST.s_name}>" class="input-xlarge" required="true" autofocus="true" >
                <label>头像</label>
                <input type="text" name="s_url" value="<{$_POST.s_url}>" class="input-xlarge" required="true" autofocus="true"  placeholder="images/StudentImages/">
                <label>性别</label>
                <select name="sex"> 
                    <option value="男">男</option>
                    <option value="女">女</option>
                </select>
                <label>班级</label>
                <input type="text" name="classNo" value="<{$_POST.classNo}>" class="input-xlarge" required="true" autofocus="true" >
                <label>专业</label>
                <input type="text" name="majob" value="<{$_POST.majob}>" class="input-xlarge" required="true" autofocus="true" >
                <label>手机&nbsp;&nbsp;<span class="label label-important" id="div2"></span></label>
                <input type="text" name="phone" value="<{$_POST.phone}>" class="input-xlarge" required="true" autofocus="true" onblur="check2()"><div id="div1"></div>
                <label>简介</label>
                <textarea name="introduce" value="<{$_POST.introduce}>" class="input-xlarge" required="true" autofocus="true"></textarea>
                <label>密码&nbsp;&nbsp;<span class="label label-important" id="div3"></span></label>
                <input type="password" name="pwd" value="<{$_POST.pwd}>" class="input-xlarge" required="true" autofocus="true"onblur="check3()" >
                <label>确认密码&nbsp;&nbsp;<span class="label label-important" id="div4"></span></label>
                <input type="password" name="pwd1" value="<{$_POST.pwd1}>" class="input-xlarge" required="true" autofocus="true" onblur="check4()">
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
        if(check1()&&check2()&&check3()&&check4()){
            return true;
        }else{
            return false;
        }
    }
    function check1(){
            var reg=/^\d{8}$/;
            var div1= document.getElementById("div1");
            var id = $("input[type='text'][name='s_id']").val();
            if (!reg.test(id)) {
                return false;
                div1.innerHTML="学号必须是8个数字";
            }else{
                div1.innerHTML="";
                return true;
            }
        }
        function check2(){
            var reg=/^1\d{10}$/;
            var div2= document.getElementById("div2");
             var id = $("input[type='text'][name='phone']").val();
            if (!reg.test(id)) {
                return false;
                div2.innerHTML="电话号码必须是11位数字且第一位是数字1";
            }else{
                div2.innerHTML="";
                return true;
            }
        }
        //密码
    function check3(){
            var reg=/^[a-zA-Z0-9]{4,10}$/;
            var div3= document.getElementById("div3");
            var id = $("input[type='password'][name='pwd']").val();
            if (!reg.test(id)) {
                
                div3.innerHTML="密码必须是4-10位";
                return false;
            }else{
                div3.innerHTML="";
                return true;
            }
        }
    //重复密码
    function check4(){
            var reg=/^[a-zA-Z0-9]{4,10}$/;
            var div4= document.getElementById("div4");
            var a=$("input[type='password'][name='pwd']").val();
            var b=$("input[type='password'][name='pwd1']").val();
            if (!reg.test(b)) {   
                div4.innerHTML="重复密码必须是4-10位";
                return false;
            }else if(a!=b){
                div4.innerHTML="输入的密码不相同";
                return false;
            }else{
                div4.innerHTML="";
                return true;
            }
        }
</script>    
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>