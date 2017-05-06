<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>
<{* TPLSTART 以上内容不需更改，保证该 TPL 页内的标签匹配即可 *}>
<div class="btn-toolbar">
	<a href="course_add.php" class="btn btn-primary"><i class="icon-plus"></i>课程</a>
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
	<a href="#page-stats" class="block-heading" data-toggle="collapse">课程列、</a>
	<div id="page-stats" class="block-body collapse in">
	<table class="table table-striped" >
			<thead>
			<tr>
				<th>课程编号</th>
				<th>课程名称</th>
				<th>课程人数</th>
				<th>已选人数</th>
				<th>剩余人数</th>
				<th>课程状态</th>
				<th>课程地点</th>
				<th>喜爱人数</th>
				<th>操作</th>
			</tr>
			</thead>
			<tbody>
			<{foreach name=course from=$courses item=course}>
				<tr>
				<td><{$course.course_id}></td>
				<td><{$course.course_name}></td>
				<td><{$course.course_num}></td>
				<td><{$course.course_num1}></td>
				<td><{$course.course_num2}></td>
				<td>
					<{$course.course_state}>	
				</td>
				<td>
					<{$course.course_where}>
				</td>
				<td><{$course.course_like}></td>
				<td>
					<a href="course_modify.php?course_id=<{$course.course_id}>" title= "修改" ><i class="icon-pencil"></i></a>
					&nbsp;
					<a data-toggle="modal" href="#myModal"  title= "删除" ><i class="icon-remove" href="course.php?method=del&course_id=<{$course.course_id}>"></i></a>
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
