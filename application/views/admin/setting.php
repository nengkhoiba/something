<?php $this->load->view('global/header')?>
       <?php $this->load->view('global/side_nav')?>
<div class="container">
                    <div class="c-header">
                        <h2>Setting <small>General Settings</small></h2>
                    </div>

                    <div class="card">
                        
                            <ul class="tab-nav tn-justified">
                                <li id="tabRole" class="active waves-effect"><a onclick="loadTab(1)" href="#">Role</a></li>
                                <li id="tabEmp" class="waves-effect"><a onclick="loadTab(2)" href="#">Employee</a></li>
                                <li id="tabUser"  class="waves-effect"><a onclick="loadTab(3)" href="#">User</a></li>
                            </ul>


                            <div id="role">   
	                            <div class="card-header">  
	                            	<h2><small>Add / Edit Role</small></h2>
	                            </div>   
	                            	<div class="card-body card-padding">
	                            			
	                            			<?php echo form_open_multipart('',array('id'=>'RoleForm','class'=>'row'))?>
	                            			<input name="ActionType" type="hidden" id="ActionType" value="0" >
			                            		<div class="form-group fg-line">
					                                <div class="fg-line">
					                                    <input placeholder="Role name" type="text" name="txtRole" class="form-control input-sm" id="txtRole" >
					                                </div>
					                                <small id="txtRoleWarning" class="help-block"></small>
					                            </div>
					
					                               <a onclick="update()" class="btn btn-primary btn-sm m-t-10 waves-effect">Save</a>
					                           
					 						<?php echo form_close() ?>
					                       
	                            	</div>
                             </div>
                             <div id="emp" style="display: none">   
	                            <div class="card-header">  
	                            	<h2><small>Add / Edit Employee</small></h2>
	                            </div>   
	                            	<div class="card-body card-padding">
	                            			
	                            			<?php echo form_open_multipart('',array('id'=>'EmpForm','class'=>'row'))?>
	                            			<input name="ActionType" type="hidden" id="ActionType" value="0" >
			                            		<div class="form-group fg-line">
					                                <div class="fg-line">
					                                    <input placeholder="Name" type="text" name="txtRole" class="form-control input-sm" id="txtRole" >
					                                </div>
					                                <small id="txtRoleWarning" class="help-block"></small>
					                            </div>
					                            <div class="form-group fg-line">
					                                <div class="fg-line">
					                                    <input placeholder="Address" type="text" name="txtRole" class="form-control input-sm" id="txtRole" >
					                                </div>
					                                <small id="txtRoleWarning" class="help-block"></small>
					                            </div>
					                            <div class="form-group fg-line">
					                                <div class="fg-line">
					                                    <input placeholder="Date of birth" type="text" name="txtRole" class="form-control input-sm" id="txtRole" >
					                                </div>
					                                <small id="txtRoleWarning" class="help-block"></small>
					                            </div>
					                            <div class="form-group fg-line">
					                                <div class="fg-line">
					                                    <input placeholder="Email" type="text" name="txtRole" class="form-control input-sm" id="txtRole" >
					                                </div>
					                                <small id="txtRoleWarning" class="help-block"></small>
					                            </div>
					                            <div class="form-group fg-line">
					                                <div class="fg-line">
					                                    <input placeholder="Mobile" type="text" name="txtRole" class="form-control input-sm" id="txtRole" >
					                                </div>
					                                <small id="txtRoleWarning" class="help-block"></small>
					                            </div>
					                            <div class="form-group fg-line">
					                                <div class="fg-line">
					                                    <input placeholder="Emergency contact" type="text" name="txtRole" class="form-control input-sm" id="txtRole" >
					                                </div>
					                                <small id="txtRoleWarning" class="help-block"></small>
					                            </div>
					                            <div class="form-group fg-line">
					                                <div class="fg-line">
					                                    <input placeholder="Profile" type="file" name="txtRole" class="form-control input-sm" id="txtRole" >
					                                </div>
					                                <small id="txtRoleWarning" class="help-block"></small>
					                            </div>
					                           
					
					                               <a onclick="update()" class="btn btn-primary btn-sm m-t-10 waves-effect">Save</a>
					                           
					 						<?php echo form_close() ?>
					                       
	                            	</div>
                             </div>
                             <div id="user" style="display: none">   
	                            <div class="card-header">  
	                            	<h2><small>Add / Edit User Account</small></h2>
	                            </div>   
	                            	<div class="card-body card-padding">
	                            			
	                            			<?php echo form_open_multipart('',array('id'=>'EmpForm','class'=>'row'))?>
	                            			<input name="ActionType" type="hidden" id="ActionType" value="0" >
			                            		<div class="form-group fg-line">
					                                <div class="fg-line">
					                                    <input placeholder="Role name" type="text" name="txtRole" class="form-control input-sm" id="txtRole" >
					                                </div>
					                                <small id="txtRoleWarning" class="help-block"></small>
					                            </div>
					
					                               <a onclick="update()" class="btn btn-primary btn-sm m-t-10 waves-effect">Save</a>
					                           
					 						<?php echo form_close() ?>
					                       
	                            	</div>
                             </div>
                             </div>		
                            		 <div class="card">
					                        <div class="card-header">
					                            <h2>Selection Data <small>This Data is for the above field</small></h2>
					                        </div>

		                        			<div class="table-responsive">
		                            				<div id="data-container">
		                            					
		                            				</div>
		                           		    </div>
                           			 </div>
							
                        
                   
                </div>
                <?php $this->load->view('global/footer')?>  
                <script>
                function update(){  
                	if ($('#txtRole').val().trim() == '') { 
                		setVelidationWarning('txtRoleWarning', 'Title is mandatory !','red');
                        $('#txtRole').focus();
                        return;
                    }
                   
                    var formData = $('form#RoleForm').serializeObject();
                    var dataString = JSON.stringify(formData);
                    var url = '<?php echo base_url();?>index.php/data_controller/UpdateRole';
                   // StartInsideLoading();
            		 $.ajax({
            		  type: "post",
            		  url: url,
            		  cache: false,    
            		  data: dataString,
            		  dataType: 'json',
            		  success: function(response){   
            		  try{  	
            			   if (response.success)
            	           { 
            				   notify(response.msg, 'inverse');
            				   $('#txtRole').val('');
            				   $('#data-container').html(response.html);
            				   $("#role-table").bootgrid({
            	                    css: {
            	                        icon: 'zmdi icon',
            	                        iconColumns: 'zmdi-view-module',
            	                        iconDown: 'zmdi-expand-more',
            	                        iconRefresh: 'zmdi-refresh',
            	                        iconUp: 'zmdi-expand-less'
            	                    },
            	                    formatters: {
            	                        "commands": function(column, row) {
            	                            return "<button type=\"button\" class=\"btn btn-icon command-edit waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button> " + 
            	                                "<button type=\"button\" class=\"btn btn-icon command-delete waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
            	                        }
            	                    }
            	                });
            				  
            	           } else
            	           { 
            	        	   notify(response.msg, 'inverse');
            	           }
            		 // StopInsideLoading();
            		  }catch(e) {  
            			  notify(e, 'inverse');
            			  
            		  }  
            		  },
            		  error: function(){      
            			  notify('Error in request!', 'inverse');
            			 
            		  }
            		 });
            	}



                function load(type){  
                   
                    var url = '<?php echo base_url();?>index.php/data_controller/'+type;
                  
            		 $.ajax({
            		  type: "post",
            		  url: url,
            		  cache: false,    
            		  dataType: 'json',
            		  success: function(response){   
            		  try{  	
            			   if (response.success)
            	           { 
            				   $('#data-container').html(response.html);
            				   $("#role-table").bootgrid({
            	                    css: {
            	                        icon: 'zmdi icon',
            	                        iconColumns: 'zmdi-view-module',
            	                        iconDown: 'zmdi-expand-more',
            	                        iconRefresh: 'zmdi-refresh',
            	                        iconUp: 'zmdi-expand-less'
            	                    },
            	                    formatters: {
            	                        "commands": function(column, row) {
            	                            return "<button type=\"button\" class=\"btn btn-icon command-edit waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button> " + 
            	                                "<button type=\"button\" class=\"btn btn-icon command-delete waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
            	                        }
            	                    }
            	                });
            				  
            	           } else
            	           { 
            	        	   notify(response.msg, 'inverse');
            	           }
            		 // StopInsideLoading();
            		  }catch(e) {  
            			  notify(e, 'inverse');
            			  
            		  }  
            		  },
            		  error: function(){      
            			  notify('Error in request!', 'inverse');
            			 
            		  }
            		 });
            	}
                load('LoadRole');

                function loadTab(id){
						switch(id){
						case 1:
							$('#user').hide();
							$('#emp').hide();
							$('#role').show();


							$('#tabEmp').removeClass('active');
							$('#tabUser').removeClass('active');
							$('#tabRole').addClass('active');
							break;
						case 2:
							$('#user').hide();
							$('#emp').show();
							$('#role').hide();
							$('#tabEmp').addClass('active');
							$('#tabUser').removeClass('active');
							$('#tabRole').removeClass('active');
							break;
						case 3:
							$('#user').show();
							$('#emp').hide();
							$('#role').hide();
							$('#tabEmp').removeClass('active');
							$('#tabUser').addClass('active');
							$('#tabRole').removeClass('active');
							break;	
						}
                    }
                </script>