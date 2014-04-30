Ext.onReady(function(){
	
	
	
	//----------------大樓combobox選項----------------------
    building_ds=new Ext.data.Store({
        proxy: new Ext.data.ScriptTagProxy({
		  method:'post',
          url: 'combo_buildingData.php'
        }),
        autoLoad:'true',
		baseParams: {yr:maxY,seme:sems},
        // create reader that reads the Topic records
        reader: new Ext.data.JsonReader({
          root: 'data',
          totalProperty: 'totalCount',
          id: 'building_ds'
         }, [
          {name: 'YR'},
          {name: 'SEM'},
		  {name: 'BUILDING'}
         ]),
		 // turn off remote sorting for local sorting
         remoteSort: false
	});
	//----------------------------------------------------
	//----------------大樓combobox--------------------------------------
	building_combo = new Ext.form.ComboBox({
						fieldLabel: '請選擇大樓',
						//disabled:true,
              			name: 'building',
              			mode: 'remode',
              			store: building_ds,
              			displayField:'BUILDING',
              			valueField:'BUILDING',
              			allowBlank :false,
              			emptyText:'請選擇大樓...',
              			typeAhead: true,
              			triggerAction:'all',
              			editable: false,
						value : '全部',
              			forceSelection: true
				});
	
	//---------------------------------------------------------
	
	
	//----------------教室combobox選項----------------------
    classRoom_ds=new Ext.data.Store({
        proxy: new Ext.data.ScriptTagProxy({
		  method:'post',
          url: 'combo_classRoom.php'
        }),
        autoLoad:'true',
		baseParams: {aca_v:maxY,sem_v:sems},
        // create reader that reads the Topic records
        reader: new Ext.data.JsonReader({
          root: 'data',
          totalProperty: 'totalCount',
          id: 'classRoom_ds'
         }, [
          {name: 'YR'},
          {name: 'SEM'},
		  {name: 'ROOMCODE'},
		  {name: 'NAME'}
         ]),
		 // turn off remote sorting for local sorting
         remoteSort: false
	});
	//----------------------------------------------------
	//-----------------------教室combobox------------------
	classRoom_combo = new Ext.form.ComboBox({
						fieldLabel: '請選擇教室',
						id: 'classRoom_combo',
						//disabled:true,
              			name: 'classRoom',
              			mode: 'local',
              			store: classRoom_ds,
              			displayField:'NAME',
              			valueField:'ROOMCODE',
              			allowBlank :false,
              			emptyText:'請選擇授課地點...',
              			typeAhead: true,
              			triggerAction:'all',
              			editable: false,
              			forceSelection: true
				});
	//-------------------------------------------------------
	
	
	clear_building_form_element_button = new Ext.Button({
												id: 'clear_building_form_element_button',
												text: '清除',
												iconCls:'clear_bui_btn',
												handler: clear_bui_f_el
	});
	
	function clear_bui_f_el(){
		classRoom_combo.clearValue();
		classRoom_combo.reset();
	}
	
			
			
	building_combo.on('select',ajax_croom_combo);
	
	classRoom_combo.store.on('beforeload',function(){
												classRoom_combo.store.removeAll();
									});
									
									
	function ajax_croom_combo(){
		var aca_value = academic_field.getValue();
		var semester_value = semester.getValue();
		var bui_value = building_combo.getValue();
		if(bui_value != ""){
			classRoom_combo.clearValue();
			classRoom_combo.reset();
			
			classRoom_combo.store.reload({params:{aca_v:aca_value,
												  sem_v:semester_value,
												  bui_v:bui_value}});
		}
	}
	
	
					 
});