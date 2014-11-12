<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Task Tools</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://res-c.qiniudn.com/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/task-tool/res/style/css/calendar.css">
	<link rel="stylesheet" href="/task-tool/res/style/css/app.css">
</head>
<body>
<div class="container-fluid app-layout">
	<div class="row">
		<div class="col-xs-12">
			<div class="row app-top">
				<div class="col-xs-1 user-wrapper">
					<div class="col-xs-12 user-photo">
						<img src="http://tp3.sinaimg.cn/2624690674/180/5662424642/1" alt="我自己" class="img-circle img-responsive">
						<span class="badge">4</span>
					</div>
				</div>
  				<div class="col-xs-3">
  					<div class="has-feedback text-warning search">
					  <label class="control-label sr-only" for="inputSuccess5">Hidden label</label>
					  <input type="text" class="form-control" id="inputSuccess5">
					  <span class="glyphicon glyphicon-search form-control-feedback"></span>
					</div>
  				</div>
  				<div class="col-xs-3 col-xs-offset-5 clearfix">
					<div class="btn-group add-subject pull-right">
						<div class="btn-group">
						  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						    
						    <?php echo ($ProjectItem[0]["ProjectName"]); ?><span class="caret"></span>
						    
						  </button><ul class="dropdown-menu" role="menu">
						  <?php if(is_array($Projects["ProjectDetails"])): $i = 0; $__LIST__ = $Projects["ProjectDetails"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Projects): $mod = ($i % 2 );++$i;?><li><a href="/task-tool/tasks/<?php echo ($Projects["id"]); ?>"><?php echo ($Projects["ProjectName"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						  	<li class="divider">
						    <li><a href="#">+添加新项目</a></li>
						  </ul>
						</div>
						<div class="btn-group">
							<button type="button" class="btn btn-warning">+添加新项目</button>
						</div>
					</div>
  				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 app-status">
			<div class="row">
				<div class="progress">
				  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
				    40% Complete 
				  </div>
				</div>
			</div>
		</div>
	</div>
	<div class="row app-container">
		<div class="col-xs-3 app-sider-bar">
			<div class="row">
				<div class="app-calendar">
					<div class="dlcontent" id="dateBox"></div>
				</div>
				<div class="app-filter">
					<div class="list-group">
					  <a href="/task-tool/tasks/<?php echo ($ProjectItem[0]["id"]); ?>" class="list-group-item <?php if(($Status != 1 and $Status != 2 and $Status != 3)): ?>active<?php endif; ?>">全部任务</a>
					  <a href="/task-tool/tasks/<?php echo ($ProjectItem[0]["id"]); ?>/1" class="list-group-item <?php if(($Status == 1)): ?>active<?php endif; ?>">进行中的任务</a>
					  <a href="/task-tool/tasks/<?php echo ($ProjectItem[0]["id"]); ?>/2" class="list-group-item <?php if(($Status == 2)): ?>active<?php endif; ?>">已中断的任务</a>
					  <a href="/task-tool/tasks/<?php echo ($ProjectItem[0]["id"]); ?>/3" class="list-group-item <?php if(($Status == 3)): ?>active<?php endif; ?>">已完成的任务</a>
					</div>
				</div>
				<div class="app-task-operation">
					<div class="btn-group btn-group-justified">
					  	<a id="addTask" href="#CreateTaskModal" class="btn btn-info app-add-task" role="button" data-toggle="modal">
						  	<span class="glyphicon glyphicon-plus-sign"></span>
							添加任务
						</a>
						
					  	<a href="#" class="btn btn-danger">
					  		<span class="glyphicon glyphicon-remove-sign"></span>
					  		删除任务
					  	</a>
					</div>

				</div>
			</div>
		</div>
		<div class="col-xs-9 app-content">
			<div class="row">
				<div class="app-time-line">
					<ul>
						<?php if(is_array($Tasks)): $i = 0; $__LIST__ = $Tasks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Tasks): $mod = ($i % 2 );++$i;?><li>
							<div class="app-task-author">
								<a class="app-task-author-photo-wrapper img-responsive" href="#">
									<img src="<?php echo ((isset($Tasks["Author_URL"]) && ($Tasks["Author_URL"] !== ""))?($Tasks["Author_URL"]):'http://tp3.sinaimg.cn/2624690674/180/5662424642/1'); ?>" alt="<?php echo ($Tasks["Author_Name"]); ?>" class="img-circle img-responsive">
									<span class="img-circle img-responsive app-task-author-name"><?php echo ($Tasks["Author_Name"]); ?></span>
								</a>
							</div>
							<div class="app-task-created-time"><?php echo (substr($Tasks["CreatedTime"],0,10)); ?></div>
							<div class="app-task">
								<div class="clearfix">
									<div class="app-task-info pull-left">
										 

										<h3><?php echo ($Tasks["TaskName"]); ?>
											<kbd <?php if(($Tasks["Status"] == 已中断)): ?>class="btn-danger"
												<?php elseif(($Tasks["Status"] == 进行中)): ?> class="btn-info"
												<?php else: ?> class="btn-success"<?php endif; ?> ><?php echo ($Tasks["Status"]); ?></kbd>
										</h3>
										<p><?php echo ((isset($Tasks["TaskDescription"]) && ($Tasks["TaskDescription"] !== ""))?($Tasks["TaskDescription"]):"没有添加描述"); ?></p>
									</div>
									<div class="app-circle-wrapper pull-right">
										<div class="app-circle">
										    <div class="app-pie-left"><div class="left"></div></div>
										    <div class="app-pie-right"><div class="right"></div></div>
										    <div class="app-circle-mask"><span><?php echo ($Tasks["ProgressingNum"]); ?></span>%</div>
										</div>
									</div>
								</div>
								<div class="app-task-spend-days">已用<span class="text-danger">10</span>天</div>
								<div class="app-task-completion-time">
								<?php if(($Tasks["EndedTime"] != NULL)): ?>完成时间：<?php echo (substr($Tasks["EndedTime"],0,10)); ?>
								<?php else: ?>当前时间：<?php echo ($Now); endif; ?>
								</div>
								<div class="app-task-owner clearfix">
									<?php if(empty($Tasks['Owner_Name'])): ?><span class="pull-left">还没有分配哦～</span>
									<?php else: ?> 
										<span class="pull-left">分配给：</span>
										<a class="app-task-author-photo-wrapper img-responsive pull-right" href="#">
											<img src="<?php echo ((isset($Tasks["Owner_URL"]) && ($Tasks["Owner_URL"] !== ""))?($Tasks["Owner_URL"]):'http://tp3.sinaimg.cn/2624690674/180/5662424642/1'); ?>" alt="<?php echo ($Tasks["Author_Name"]); ?>" class="img-circle img-responsive">
											<span class="img-circle img-responsive app-task-author-name"><?php echo ($Tasks["Owner_Name"]); ?></span>
										</a><?php endif; ?>
									
								</div>
								
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Form Modal -->
<div class="modal fade" id="CreateTaskModal" tabindex="-1" role="dialog" aria-labelledby="CreateTaskModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="CreateTaskModalLabel">添加新任务</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">标题：</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" id="inputEmail3" placeholder="任务标题">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">描述：</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="inputPassword3" placeholder="任务描述">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">分配给：</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="inputPassword3" placeholder="用户名称">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Sign in</button>
		    </div>
		  </div>
		</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>







<script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="/task-tool/res/style/js/calendar.js"></script>
<script type="text/javascript">
    
    	
    	$(function(){
    		var calendarManager = new calendar().init({toEl: '#dateBox'});	

    		$('#addTaks').click(function(){

    		});	

    		$('.c_td').click(function(){
    			var date = $(this).attr('title');

    			var url = window.location.href;
    			var key = url.indexOf('date')
    			
    			if(key > 0){
    				url = url.substring(0,key);
    				url = url+'date/'+date;
    			}else{
    				url = url+'date/'+date;
    			}
    			
    		});
    	});

    	$('.app-circle').each(function(index, el) {
	        var num = $(this).find('span').text() * 3.6;
	        if (num<=180) {
	        	$(this).addClass('app-circle-progressing');
	            $(this).find('.right').css('transform', "rotate(" + num + "deg)");
	        } else {
	        	if (num<360) {
	        		$(this).addClass('app-circle-progressing');
	        	}
	            $(this).find('.right').css('transform', "rotate(180deg)");
	            $(this).find('.left').css('transform', "rotate(" + (num - 180) + "deg)");
	        };
	    });

    	
    </script>	
</body>
</html>