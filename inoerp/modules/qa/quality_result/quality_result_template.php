<form  method="post" id="qa_quality_result"  name="qa_quality_result">
 <span class="heading"><?php echo gettext('Quality Results') ?></span>
 <div id ="form_header"><?php $f = new inoform() ?>
  <div id="tabsHeader">
   <ul class="tabMain">
    <li><a href="#tabsHeader-1"><?php echo gettext('Basic') ?></a></li>
   </ul>
   <div class="tabContainer"> 
    <div id="tabsHeader-1" class="tabContent">
     <div class="large_shadow_box"> 
      <ul class="column header_field">
      <li><?php $f->l_text_field_d('reference_type'); ?></li>
       <li><?php $f->l_text_field_d('reference_entity'); ?></li>
       <li><?php $f->l_text_field_d('reference_key_name'); ?></li>
       <li><?php $f->l_text_field_d('reference_key_value'); ?></li>
              <li><?php
        echo $f->l_select_field_from_object('qa_cp_header_id', qa_cp_header::find_all(), 'qa_cp_header_id', 'plan_name', $$class->qa_cp_header_id, 'qa_cp_header_id', '', 1);
        ?>
       </li><a name="show" href="form.php?class_name=qa_quality_result&<?php echo "mode=$mode"; ?>" class="show action document_id qa_quality_result ino-left-30-n"><i class="fa fa-refresh"></i></a>
      </ul>
     </div>
    </div>
   </div>
  </div>
 </div>

 <div id ="form_line" class="form_line"><span class="heading"><?php echo gettext('Quality Elements') ?></span>
  <div id="tabsLine">
   <ul class="tabMain">
    <li><a href="#tabsLine-1"><?php echo gettext('Basics') ?></a></li>
   </ul>
   <div class="tabContainer"> 
    <div id="tabsLine-1" class="tabContent">
     <div class="first_rowset"> 
      <ul class="column header_field two_column_form"> 
       <?php
//        pa($qa_cp_element_obj);
        foreach ($qa_cp_element_obj as $qa_cp_element) {
         if (empty($qa_cp_element->sys_element_name)) {
          continue;
         }
         $ce_table = 'qa_ce_' . $qa_cp_element->sys_element_name;
         $qa_cp_element_value = null;
//         $ef_all_value = sys_extra_field_instance::find_by_fieldName_referenceDetails($ef->sys_field_name, 'wip_wo_routing_line', $routing_line->wip_wo_routing_line_id);
//         if ($ef_all_value) {
//          $ef_value_key = $ef_table . '_value';
//          $ef_value = $ef_all_value->$ef_value_key;
//         } else {
//          $ef_value = null;
//         }

         $label = !empty($qa_cp_element->element_name) ? $qa_cp_element->element_name : $qa_cp_element->sys_element_name;
         echo "<li><label>$label </label>";
         switch ($qa_cp_element->data_type) {
          case 'LIST':
           $qa_ce_lines = qa_collection_element_line::find_by_parent_id($qa_cp_element->qa_collection_element_header_id);
           if (!empty($qa_ce_lines)) {
            echo $f->select_field_from_object($qa_cp_element->sys_element_name, $qa_ce_lines, 'qa_collection_element_line_id', 'element_value', $qa_cp_element_value);
           } else {
            echo $f->text_field($qa_cp_element->sys_element_name, $qa_cp_element_value);
           }
           break;

          case 'BOOLEAN' :
           echo $f->checkBox_field($qa_cp_element->sys_element_name, $qa_cp_element_value);
           break;

          case 'FILE' :
           $qa_cp_element_file_name = $qa_cp_element->sys_element_name . '_file';
           $file_routing = file::find_by_fieldName_referenceTable_and_id($qa_cp_element->sys_element_name, 'wip_wo_routing_line', $routing_line->wip_wo_routing_line_id);
           echo ino_attachement($file_routing, $qa_cp_element_file_name);
           echo $f->hidden_field($qa_cp_element->sys_element_name, $qa_cp_element_value);
           break;

          case 'OPTION_LIST' :
           if (!empty($qa_cp_element->list_value_option_type)) {
            echo $f->select_field_from_object($qa_cp_element->sys_element_name, option_line::find_by_parent_id($qa_cp_element->option_header_id), 'option_line_code', 'option_line_value', $qa_cp_element_value);
           } else {
            echo $f->text_field($qa_cp_element->sys_element_name, $qa_cp_element_value);
           }
           break;
          default :
           echo $f->text_field($qa_cp_element->sys_element_name, $qa_cp_element_value);
           break;
         }

         echo '</li>';
        }
        ?>
      </ul>
     </div>
    </div> 
   </div>
  </div>
 </div> 
</form>

<div id="js_data">
 <ul id="js_saving_data">
  <li class="headerClassName" data-headerClassName="qa_quality_result" ></li>
  <li class="savingOnlyHeader" data-savingOnlyHeader="true" ></li>
  <li class="primary_column_id" data-primary_column_id="qa_quality_result_id" ></li>
  <li class="form_header_id" data-form_header_id="qa_quality_result" ></li>
 </ul>

 <ul id="js_contextMenu_data">
  <li class="docHedaderId" data-docHedaderId="qa_quality_result_id" ></li>
  <li class="btn1DivId" data-btn1DivId="qa_quality_result" ></li>
 </ul>
</div>