<?php
global $app_func;
if (!isset($app_func) || !is_object($app_func)) {
    require_once dirname(__DIR__) . "/App_Classes/App_Funcations.php";
    $app_func = new App_Funcation();
}

    $sqlsectorcount = "SELECT * FROM sector where  Is_Actieved='Yes' and lang_id='1'";
    $resultSectorcount =$app_func->query($sqlsectorcount);
    $Total_Sector = $resultSectorcount->num_rows;
    $sqlcategorycount = "SELECT * FROM category where  Is_Actieved='Yes' and lang_id='1'";
    $resultcategorycount =$app_func->query($sqlcategorycount);
    $Total_category = $resultcategorycount->num_rows;
    $sqlclientscount = "SELECT * FROM partenrs where  Is_Actieved='Yes' and lang_id='1' and Partenr_type='clients'";
    $resultclientscount =$app_func->query($sqlclientscount);
    $Total_clients = $resultclientscount->num_rows;
    $sqlpartenrscount = "SELECT * FROM partenrs where  Is_Actieved='Yes' and lang_id='1' and Partenr_type='partenrs'";
    $resultpartenrscount =$app_func->query($sqlpartenrscount);
    $Total_partenrs = $resultpartenrscount->num_rows;

?>

	<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        	<span  class=" dashboard-stat dashboard-stat-light  blue-soft">
						<div class="visual">
							<i class="fa fa-group"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php  echo $Total_Sector;  ?>
							</div>
							<div class="desc"  style="font-weight: bold; ">
							 قطاعات
							</div>
						</div>
						</span>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        	<span  class=" dashboard-stat dashboard-stat-light red-soft" >
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
							 <?php echo $Total_category ?>
							</div>
							<div class="desc"  style="font-weight: bold; ">
								خدمة مميزة 
							</div>
						</div>
						</span>
					</div>
					     

					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<span  class=" dashboard-stat dashboard-stat-light yellow">
                        <div class="visual">
							<i class="fa fa-map-marker"></i>
						</div>
						<div class="details">
							<div class="number">
							  <?php echo $Total_clients ?>
							</div>
							<div class="desc" style="font-weight: bold; ">
							 عميل
							</div>
						</div>
						</span>
					</div> 
                       

                      <div class="col-lg-3 col-xs-12 col-sm-12">
                            <span  class=" dashboard-stat dashboard-stat-light blue-soft">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                               <?php echo $Total_partenrs ?>
                            </div>
                            <div class="desc" style="font-weight: bold; ">
                                  شركاء استراتيجيين
                            </div>
                        </div>
                        </span>
                    </div>  


				 

					 
					 



                   
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<span  class=" dashboard-stat dashboard-stat-light yellow">
                        <div class="visual">
							<i class="fa fa-map-marker"></i>
						</div>
						<div class="details">
							<div class="number">
							</div>
							<div class="desc" style="font-weight: bold; ">
							       <h4 align="center">
							     <a href="../editor/editor.php" target="_blank" style="color: #fff">
							     	  للذهاب الى المحرر  النصوص
							     </a>
							 </h4>
							</div>
						</div>
						</span>
					</div>     

				

					 
				</div>

  <style type="text/css">
  	.row.no-margin{
  		margin:0;
  		direction:ltr; 
  	}
  	.amcharts-chart-div a[href="http://www.amcharts.com/javascript-charts/"]{
  		display:none !important; 
  	}
  </style>

                <div class="row no-margin">
                                <div class="col-md-12">
                                    <!-- BEGIN CHART PORTLET-->
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-bar-chart font-green-haze"></i>
                                                 <h1>إحصائيات زوار  الموقع</h1>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="portlet-body">
                                            <div id="chart_12" class="chart" style="height: 500px;"> </div>

           
                                        </div>
                                    </div>
                                    <!-- END CHART PORTLET-->
                                </div>
                            </div>
                            <!-- END ROW -->                
				<div class="row no-margin">
					
                     <div class="col-md-12">
                     	 
                     	 
                         
                      <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                
                                                <h1><i class="icon-bar-chart font-green-haze"></i>  إحصائيات زوار الصفحات  </h1>
                                                
                                                
                                            </div>
                                           
                                        </div>
                                        <div class="portlet-body">
                                            <div id="chart_5" class="chart" style="height: 400px;"> </div>
                                            <div class="well margin-top-20">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label class="text-left">Top Radius:</label>
                                                        <input class="chart_5_chart_input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01" /> </div>
                                                    <div class="col-sm-3">
                                                        <label class="text-left">Angle:</label>
                                                        <input class="chart_5_chart_input" data-property="angle" type="range" min="0" max="89" value="30" step="1" /> </div>
                                                    <div class="col-sm-3">
                                                        <label class="text-left">Depth:</label>
                                                        <input class="chart_5_chart_input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1" /> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                       

                            </div>
 
				</div>


			<!-- 	<div class="row no-margin">
					
                     <div class="col-md-12">
                     	 
                        
                          <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-bar-chart font-green-haze"></i>
                                                <span class="caption-subject bold uppercase font-green-haze">Visitor Statistics</span>
                                               
                                            </div>
                                            
                                        </div>
                                        <div class="portlet-body">
                                            <div id="chart_3" class="chart" style="height: 400px;"> </div>
                                        </div>
                                    </div>
                                      

                            </div>
 
				</div> -->


                            	<div class="clearfix">
				</div>
                	<!-- END DASHBOARD STATS -->
                       <?php 
              $page_chart= array();
             $page_chart=$app_func->stattracker_page_chart(); 
          
               
             ?> 
  <script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/amcharts/serial.js" type="text/javascript"></script>
  
  <script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/amcharts/pie.js" type="text/javascript"></script>
        <script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/amcharts/radar.js" type="text/javascript"></script>  
        
        <script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/amcharts/themes/patterns.js" type="text/javascript"></script>  
              
        <script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/amcharts/themes/light.js"></script>
        <script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/amcharts/themes/chalk.js"></script>
        
 <script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
 
<script type="text/javascript">
  
 
          
           
     var e=AmCharts.makeChart("chart_5", {
            theme:"light", type:"serial", startDuration:2, fontFamily:"Open Sans", color:"#888", dataProvider:<?php  echo  json_encode($page_chart); ?>,
             valueAxes:[ {
                position: "left", axisAlpha: 0, gridAlpha: 0
            }
            ], graphs:[ {
                balloonText: "[[category]]: <b>[[value]]</b>", colorField: "color", fillAlphas: .85, lineAlpha: .1, type: "column", topRadius: 1, valueField: "visits"
            }
            ], depth3D:40, angle:30, chartCursor: {
                categoryBalloonEnabled: !1, cursorAlpha: 0, zoomable: !1
            }
            , categoryField:"country", categoryAxis: {
                gridPosition: "start", axisAlpha: 0, gridAlpha: 0
            }
            , exportConfig: {
                menuTop:"20px", menuRight:"20px", menuItems:[ {
                    icon: "/lib/3/images/export.png", format: "png"
                }
                ]
            }
        }
        , 0);
        jQuery(".chart_5_chart_input").off().on("input change", function() {
            var t=jQuery(this).data("property"), a=e;
            e.startDuration=0, "topRadius"==t&&(a=e.graphs[0]), a[t]=this.value, e.validateNow()
        }
        ),
        $("#chart_5").closest(".portlet").find(".fullscreen").click(function() {
            e.invalidateSize()
        }
        );

 
 //    var e=AmCharts.makeChart("chart_3", {
 //     type:"serial", theme:"light", fontFamily:"Open Sans", color:"#888888", pathToImages:"../plugins/assets/global/plugins/amcharts/images/", dataProvider:[ {
 //         lineColor: "#b7e021", date: "2012-01-01", duration: 408
 //     }
 //     , {
 //         date: "2012-01-02", duration: 482
 //     }
 //     , {
 //         date: "2012-01-03", duration: 562
 //     }
 //     , {
 //         date: "2012-01-04", duration: 379
 //     }
 //     , {
 //         lineColor: "#fbd51a", date: "2012-01-05", duration: 501
 //     }
 //     , {
 //         date: "2012-01-06", duration: 443
 //     }
 //     , {
 //         date: "2012-01-07", duration: 405
 //     }
 //     , {
 //         date: "2012-01-08", duration: 309, lineColor: "#2498d2"
 //     }
 //     , {
 //         date: "2012-01-09", duration: 287
 //     }
 //     , {
 //         date: "2012-01-10", duration: 485
 //     }
 //     , {
 //         date: "2012-01-11", duration: 890
 //     }
 //     , {
 //         date: "2012-01-12", duration: 810
 //     }
 //     ], balloon: {
 //         cornerRadius: 6
 //     }
 //     , valueAxes:[ {
 //         duration:"mm", durationUnits: {
 //             hh: "h ", mm: "min"
 //         }
 //         , axisAlpha:0
 //     }
 //     ], graphs:[ {
 //         bullet: "square", bulletBorderAlpha: 1, bulletBorderThickness: 1, fillAlphas: .3, fillColorsField: "lineColor", legendValueText: "[[value]]", lineColorField: "lineColor", title: "duration", valueField: "duration"
 //     }
 //     ], chartScrollbar: {}
 //     , chartCursor: {
 //         categoryBalloonDateFormat: "YYYY MMM DD", cursorAlpha: 0, zoomable: !1
 //     }
 //     , dataDateFormat:"YYYY-MM-DD", categoryField:"date", categoryAxis: {
 //         dateFormats:[ {
 //             period: "DD", format: "DD"
 //         }
 //         , {
 //             period: "WW", format: "MMM DD"
 //         }
 //         , {
 //             period: "MM", format: "MMM"
 //         }
 //         , {
 //             period: "YYYY", format: "YYYY"
 //         }
 //         ], parseDates:!0, autoGridCount:!1, axisColor:"#555555", gridAlpha:0, gridCount:50
 //     }
 // }
 
 // );
 // $("#chart_3").closest(".portlet").find(".fullscreen").click(function() {
 //     e.invalidateSize()
 // } );


             <?php 
              $vistor_chart= array();
             $vistor_chart=$app_func->stattracker_vistor_chart(); 
          
               
             ?> 
  var t=<?php  echo  json_encode($vistor_chart); ?>; 
var a=AmCharts.makeChart("chart_12", {
    type:"stock", theme:"dark", pathToImages:"../../plugins/assets/global/plugins/amcharts/images/", fontFamily:"Open Sans", color:"#888", dataSets:[ {
        color:"#b0de09", fieldMappings:[ {
            fromField: "value", toField: "value"
        }
        , {
            fromField: "volume", toField: "volume"
        }
        ], dataProvider:t, categoryField:"date", 
    }
    ], panels:[ {
        title:"Value", percentHeight:70, stockGraphs:[ {
            id: "g1", valueField: "value"
        }
        ], stockLegend: {
            valueTextRegular: " ", markerType: "none"
        }
    }
    ], chartScrollbarSettings: {
        graph: "g1"
    }
    , chartCursorSettings: {
        valueBalloonsEnabled: !0, graphBulletSize: 1, valueLineBalloonEnabled: !0, valueLineEnabled: !0, valueLineAlpha: .5
    }
    , periodSelector: {
        periods:[ {
            period: "DD", count: 10, label: "10 days"
        }
        , {
            period: "MM", count: 1, label: "1 month"
        }
        , {
            period: "YYYY", count: 1, label: "1 year"
        }
        , {
            period: "YTD", label: "YTD"
        }
        , {
            period: "MAX", label: "MAX"
        }
        ]
    }
    , panelsSettings: {
        usePrefixes: !0
    }
}

);
$("#chart_12").closest(".portlet").find(".fullscreen").click(function() {
    a.invalidateSize()
}); 
</script>  

