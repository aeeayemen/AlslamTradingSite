<?php
/**
 *كود خاص بجزء كان سيتم تفعيله في المستقبل 
 * هذا الجزء خاص بمربع الدردشة بين المستخدمين  
 */
include("./Models/App_Classes/App_Funcations.php");
$app_func= new App_Funcation();



?>
<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
						<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">

                        <?php $app_func->Get_chatlist_list(); ?>
                        
                        
						</div>
						<div class="page-quick-sidebar-item">
							<div class="page-quick-sidebar-chat-user">
								<div class="page-quick-sidebar-nav">
									<a href="javascript:;" class="page-quick-sidebar-back-to-list"><i class="icon-arrow-left"></i>Back</a>
								</div>
								<div class="page-quick-sidebar-chat-user-messages">
										
								</div>
								<div class="page-quick-sidebar-chat-user-form">
									<div class="input-group">
										<input type="text" class="form-control" id="chatsender" placeholder="ادخل نص الرساله هنا"/>
										<div class="input-group-btn">
											<button type="button" class="btn red"><i class="icon-paper-clip"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>



