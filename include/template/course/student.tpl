<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<{* TPLSTART 以上内容不需更改，保证该 TPL 页内的标签匹配即可 *}>
<div class="btn-toolbar">
    <a href="student_add.php" class="btn btn-primary"><i class="icon-plus"></i>学生信息</a>
<a data-toggle="collapse" data-target="#search"  href="#" title= "检索"><button class="btn btn-primary" style="margin-left:5px"><i class="icon-search"></i></button></a>
</div>

<!-- 下面是可折叠搜索栏 -->
<{if $_GET.search }>
<div id="search" class="collapse in">
<{else }>
<div id="search" class="collapse out" >
<{/if }>
<form class="form_search"  action="" method="GET" style="margin-bottom:0px">
<div style="float:left;margin-right:5px">
<label>查询所有请留空</label>
<input type="text" name="s_name" value="<{$_GET.s_name}>" placeholder="输入学生姓名" >
<input type="hidden" name="search" value="1" >
</div>
<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
<button type="submit" class="btn btn-primary">检索</button>
</div>
<div style="clear:both;"></div>
</form>
</div>

<div class="block">
    <a href="#page-stats" class="block-heading" data-toggle="collapse">学生信息</a>
    <div id="page-stats" class="block-body collapse in">
    <table class="table table-striped" >
            <thead>
            <tr>
                <th>学号</th>
                <th>姓名</th>
                <th>头像</th>
                <th>性别</th>
                <th>班级</th>
                <th>专业</th>
                <th>简介</th>
                <th>手机</th>
                <th>积分</th>
                <th>密码</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <{foreach name=student from=$students item=student}>
                <tr>
                <td><{$student.s_id}></td>
                <td><{$student.s_name}></td>
                <td><img src="<{$img}><{$student.s_url}>" alt=""width='50xp';></td>
                <td><{$student.sex}></td>
                <td><{$student.classNo}></td>
                <td>
                    <{$student.majob}>    
                </td>
                <td>
                    <{$student.introduce}>
                </td>
                <td><{$student.phone}></td>
                <td><{$student.integral}></td>
                <td><{$student.pwd}></td>
                <td>
                    <a href="student_modify.php?s_id=<{$student.s_id}>" title= "修改" ><i class="icon-pencil"></i></a>
                    &nbsp;
                    <a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="student.php?method=del&s_id=<{$student.s_id}>"></i></a>
                </td>
                </tr>
            <{/foreach}>
          </tbody>
        </table>
        <!--- START 分页模板 --->
               <{$page_html}>
        <!--- END 分页--->    
    </div>
</div>

<!---操作的确认层，相当于javascript:confirm函数--->
<{$osadmin_action_confirm}>
    
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>
