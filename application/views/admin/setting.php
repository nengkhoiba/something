<?php $this->load->view('global/header')?>
       <?php $this->load->view('global/side_nav')?>
<div class="container">
                    <div class="c-header">
                        <h2>Setting <small>General Settings</small></h2>
                    </div>

                    <div class="card" id="profile-main">
                        
                            <ul class="tab-nav tn-justified">
                                <li class="active waves-effect"><a href="#">Role</a></li>
                                <li class="waves-effect"><a href="">Employee</a></li>
                                <li class="waves-effect"><a href="">User</a></li>
                            </ul>


                            <div id="role">
                            	<div class="card-body card-padding">
                            		<div class="col-sm-6">
                            			<?php echo form_open_multipart('',array('id'=>'RoleForm','class'=>'row'))?>
                            			<input type="hidden" id="ActionType" value="0" >
		                            		<div class="form-group has-success">
				                                <div class="fg-line">
				                                    <label class="control-label" for="txtRole">Role</label>
				                                    <input type="text" class="form-control" id="txtRole" >
				                                </div>
				                                <small id="txtRoleWarning" class="help-block"></small>
				                            </div>
				
				                            <div class="form-group">
				                               <button onclick="update()" class="btn palette-Teal bg waves-effect">Save</button>
				                            </div>
				 						<?php echo form_close() ?>
				                           
                            		</div>
                            		<div class="col-sm-6">
                            				<div id="data-container">
                            				
                            				</div>
                            		</div>
		                            
                           		 </div>
                            </div>
							
                        
                    </div>
                </div>
                <?php $this->load->view('global/footer')?>  
                <script>
                
                function setVelidationWarning(id,msg,type){
						$('#'+id).html(msg);
                    }
                

                function update(){  
                	if ($('#txtRole').val().trim() == '') { 
                		setVelidationWarning('txtRoleWarning', 'Title is mandatory !');
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
            				   
            				  
            	           } else
            	           { 
            	        	   notify(response.msg, 'inverse');
            	           }
            		  StopInsideLoading();
            		  }catch(e) {  
            			  notify(e, 'inverse');
            			  
            		  }  
            		  },
            		  error: function(){      
            			  notify('Error in request!', 'inverse');
            			 
            		  }
            		 });
            	}
                </script>