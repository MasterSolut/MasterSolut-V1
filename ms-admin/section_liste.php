<?php
/**
 * @author Marc 
 * @Contact +228 90 33 74 53, marctsivanyo@gmail.com
 * @copyright Février 2016
 */ 
    $type="page";
    if($id_menu){
        $this_section=$classpage_menu->this_menu($id_menu);
        if($this_section["lib_menu"]=="Panel Section-Album"){
            $type="album";
        }
    } 
?>  
   <!-- Row Start -->
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="widget">
          <div class="widget-header">
            <div class="title">
              Liste des section<a id="dynamic-tables">s</a> 
            </div>
            <span class="tools">
                <a href="javascript:openwindows('section_form.php?type=<?php echo $type ?>',500,400,false)" title="Ajouter une section" class="btn btn-primary">
                      <span class="fa fa-plus"></span>
                        Nouveau
                </a>
            </span> 
          </div>
          <div class="widget-body">
            <div id="dt_example" class="example_alt_pagination">
              <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table"> 
                <thead>
                  <tr> 
                    <th style="width:15%">
                      Libell&eacute;
                    </th>
                    <th style="width:10%">
                        Fixation bar
                    </th>  
                    <th style="width:20%">
                        Description
                    </th>
                    <th style="width:20%; text-align: center;" class="hidden-phone">
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    //$i=1;
                	$tab_section=$classsection->liste_section($type,0,"ORDER BY lib_section ASC");
                    foreach($tab_section as $sectionValue){
                        $idSection=$sectionValue["id_section"];
                        $libSection=stripslashes($sectionValue["lib_section"]);
                        $DescSection=stripslashes($sectionValue["desc_section"]);
                        $fixedSection=stripslashes($sectionValue["fixed_section"]);  
                ?>
                  <tr>
                    <td> 
                        <?php echo $libSection; ?> 
                    </td>
                    <td>
                      <?php echo $fixedSection; ?>
                    </td>
                    <td>
                      <?php echo $DescSection; ?>
                    </td> 
                     
                    <td style="text-align: center;"> 
                      <a  data-original-title="" title="Modifier" href="javascript:openwindows('section_form.php?type=<?php echo $type ?>&mod=<?php echo $idSection ?>',500,400,false)" class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                      </a>
                      <a  data-original-title="" title="Supprimer"  href="javascript:if(confirm('Voulez vous effectuer cette op&eacute;ration?')) openwindows('section_form.php?supp_section=<?php echo $idSection ?>',20,40,false)" class="btn btn-danger">
                            <i class="fa fa-trash-o"></i>
                      </a>
                    </td>
                  </tr>
                 <?php  
                    }
                ?>
                </tbody>
              </table>
              <div class="clearfix">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Row End -->