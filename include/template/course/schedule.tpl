<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<{* TPLSTART 以上内容不需更改，保证该 TPL 页内的标签匹配即可 *}>
<div class="btn-toolbar">
    <a href="schedule_add.php" class="btn btn-primary"><i class="icon-plus"></i>选课信息</a>
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
<input type="text" name="s_id" value="<{$_GET.s_id}>" placeholder="输入学号" >
<input type="hidden" name="search" value="1" >
</div>
<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
<button type="submit" class="btn btn-primary">检索</button>
</div>
<div style="clear:both;"></div>
</form>
</div>

<div class="block">
    <a href="#page-stats" class="block-heading" data-toggle="collapse">学生选课</a>
    <div id="page-stats" class="block-body collapse in">
    <table class="table table-striped" >
            <thead>
            <tr>
                <th>课程编号</th>
                <th>课程名称</th>
                <th>学号</th>
                <th>姓名</th>
                <th>课程进度</th>
                <th>作业进度</th>
                <th>缺勤次数</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <{foreach name=schedule from=$schedules item=schedule}>
                <tr>
                <td><{$schedule.c_id}></td>
                <td><{$schedule.course_name}></td>
                <td><{$schedule.s_id}></td>
                <td><{$schedule.s_name}></td>
                <td><{$schedule.ytime}>/<{$schedule.course_hour}></td>
                <td>
                    <{$schedule.ytask}>/<{$schedule.course_task}>
                </td>
                <td><{$schedule.absence}></td>
                <td><{$schedule.state}></td>
                <td>
                    <a href="schedule_modify.php?c_id=<{$schedule.c_id}>&s_id=<{$schedule.s_id}>" title= "修改" ><i class="icon-pencil"></i></a>
                    &nbsp;
                    <a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="schedule.php?method=del&c_id=<{$schedule.c_id}>&s_id=<{$schedule.s_id}>"></i></a>
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
