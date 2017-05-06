<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<{* TPLSTART 以上内容不需更改，保证该 TPL 页内的标签匹配即可 *}>
<div class="btn-toolbar">
    <a href="details_add.php" class="btn btn-primary"><i class="icon-plus"></i>课程详情</a>
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
<input type="text" name="course_name" value="<{$_GET.course_name}>" placeholder="输入课程名称" >
<input type="hidden" name="search" value="1" >
</div>
<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
<button type="submit" class="btn btn-primary">检索</button>
</div>
<div style="clear:both;"></div>
</form>
</div>



<div class="block">
    <a href="#page-stats" class="block-heading" data-toggle="collapse">课程详情</a>
    <div id="page-stats" class="block-body collapse in">
    <table class="table table-striped" >
            <thead>
            <tr>
                <th>课程编号</th>
                <th>课程名称</th>
                <th>课程图片</th>
                <th>课程老师</th>
                <th>老师头像</th>
                <th>课时</th>
                <th>适合人群</th>
                <th>开课时间</th>
                <th>课程概述</th>
                <th>课程星数</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <{foreach name=details from=$details item=det}>
                <tr>
                <td><{$det.course_id}></td>
                <td><{$det.course_name}></td>
                <td><img src="<{$img}><{$det.course_url}>" alt="" width='80xp';></td>
                <td><{$det.t_name}></td>
                <td><img src="<{$img}><{$det.t_url}>" alt=""width='50xp';></td>
                <td><{$det.course_hour}></td>
                <td><{$det.people}></td>
                <td><{$det.course_open}></td>
                <td><{$det.course_summary}></td>
                <td><{$det.course_star}></td>
                <td><a href="details_modify.php?course_id=<{$det.course_id}>" title= "修改" ><i class="icon-pencil"></i></a>
                &nbsp;
                
                
                <a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="details.php?method=del&course_id=<{$det.course_id}>#myModal" data-toggle="modal" ></i></a>
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
