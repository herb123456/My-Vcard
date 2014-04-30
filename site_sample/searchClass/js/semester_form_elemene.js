Ext.onReady(function(){
Ext.QuickTips.init();
	//計算目前是第幾學年度
	var m = new Date().getMonth()+1;
	if(m < 7){
		maxY = new Date().getFullYear() - 1912;
		sems = 2;
	}else{
		maxY = new Date().getFullYear() - 1911;
		sems = 1;
	}
	//------------------------------------------------------------------------------------------
	//--------------------學年NumberField----------------------------------------------
	academic_field = new Ext.form.NumberField({
				id: 'academic_year',
				fieldLabel: '學年度',
				name: 'academic_year',
				maxValue : maxY,
				maxText : '此學年度太久遠摟',
				minValue : 94,
				minText : '此學年度太古老摟',
				allowBlank:false,
				blankText : '現在是第'+maxY+'學年度',
				value: maxY
			});
	//-----------------------------------------------------------------------------
	
	
	//-----------------學期combobox選項--------------------
	Ext.namespace('semCombo', 'semCombo.sem');
 
	semCombo.sem = [
		['1', '第一學期'],
		['2', '第二學期'],
		['3', '暑假'],
		['4', '寒假']
	];
	//-----------------------------------------------------
	//---------------------------學期combobox---------------------------------------------
	semester = new Ext.form.ComboBox({
					name: 'semester',
					id: 'semester',
					fieldLabel:'學期',
                    displayField:'sname',
                    valueField:'sid',
					hiddenName:'sid',
					emptyText:'請選擇第幾學期...',
                    store: new Ext.data.SimpleStore({
                        fields:['sid', 'sname'],
                        data:semCombo.sem
                    }),
                    triggerAction:'all',
					allowBlank:false,
					blankText: '請選擇學期',
					readOnly: true,
					editable: false,
					value: sems,
                    mode:'local'
				
				});
	//---------------------------------------------------------------------------------
	
	
	//----------------系所combobox選項----------------------
    depType_ds=new Ext.data.Store({
        proxy: new Ext.data.ScriptTagProxy({
		  method:'post',
          url: 'combo_depType.php'
        }),
        autoLoad:'true',
		baseParams: {base_aca_v:maxY,base_sem_v:sems},
        // create reader that reads the Topic records
        reader: new Ext.data.JsonReader({
          root: 'data',
          totalProperty: 'totalCount',
          id: 'depType_ds'
         }, [
          {name: 'YR'},
          {name: 'SEM'},
		  {name: 'NAME'}
         ]),
		 // turn off remote sorting for local sorting
         remoteSort: false
	});
	//----------------------------------------------------
	//----------------系所combobox--------------------------------------
	depcombo = new Ext.form.ComboBox({
						fieldLabel: '請選擇學制',
						//disabled:true,
              			name: 'dep',
              			mode: 'local',
              			store: depType_ds,
              			displayField:'NAME',
              			valueField:'NAME',
              			allowBlank :false,
              			emptyText:'請選擇學制...',
              			typeAhead: true,
              			triggerAction:'all',
              			editable: false,
              			forceSelection: true
				});
	
	//---------------------------------------------------------
	
	
	//----------------學院combobox選項----------------------
    faculty_ds=new Ext.data.Store({
        proxy: new Ext.data.ScriptTagProxy({
		  method:'post',
          url: 'combo_faculty.php'
        }),
        autoLoad:'true',
		baseParams: {base_aca_v:maxY,base_sem_v:sems},
        // create reader that reads the Topic records
        reader: new Ext.data.JsonReader({
          root: 'data',
          totalProperty: 'totalCount',
          id: 'faculty_ds'
         }, [
          {name: 'YR'},
          {name: 'SEM'},
		  {name: 'NAME'}
         ]),
		 // turn off remote sorting for local sorting
         remoteSort: false
	});
	//----------------------------------------------------
	//-----------------------學院combobox------------------
	facombo = new Ext.form.ComboBox({
						fieldLabel: '請選擇學院',
						//disabled:true,
              			name: 'faculty',
              			mode: 'local',
              			store: faculty_ds,
              			displayField:'NAME',
              			valueField:'NAME',
              			allowBlank :false,
              			emptyText:'請選擇學院...',
              			typeAhead: true,
              			triggerAction:'all',
              			editable: false,
              			forceSelection: true
				});
	//-------------------------------------------------------
	
	
	
	//-------------系別combobox選項-----------------------
	faculty_ch_ds=new Ext.data.Store({
        		proxy: new Ext.data.ScriptTagProxy({
          			method:'post',
					url: 'combo_ch_faculty.php'
       	 		}),
				autoLoad:'false',
				//baseParams: {ch:va},
        		// create reader that reads the Topic records
        		reader: new Ext.data.JsonReader({
          			root: 'data',
          			totalProperty: 'totalCount',
          			id: 'faculty_ch_ds'
         		}, [
          			{name: 'YR'},
          			{name: 'SEM'},
					{name: 'DEPTGRPCODE'},
					{name: 'GRAD'},
					{name: 'NAME'}
				]),
		 		// turn off remote sorting for local sorting
         		remoteSort: false
		});
	//----------------------------------------------------------
	//----------------------系別combox---------------------------
	ch_fa_combo = new Ext.form.ComboBox({
						//disabled:true,
						id:'ch_fa_combo',
						fieldLabel: '請選擇系別',
              			name: 'faculty',
              			mode: 'local',
              			store: faculty_ch_ds,
              			displayField:'NAME',
              			valueField:'DEPTGRPCODE',
						hiddenName:'DEPTGRPCODE',
              			allowBlank :false,
              			emptyText:'請先選擇系別...',
              			typeAhead: true,
              			triggerAction:'all',
              			editable: false,
						forceSelection: true
				});
	//---------------------------------------------------------
	
	
	
	//-------------年級combobox選項-----------------------
	grade_ds=new Ext.data.Store({
        		proxy: new Ext.data.ScriptTagProxy({
          			method:'post',
					url: 'combo_grade.php'
       	 		}),
				autoLoad:'false',
				//baseParams: {ch:va},
        		// create reader that reads the Topic records
        		reader: new Ext.data.JsonReader({
          			root: 'data',
          			totalProperty: 'totalCount',
          			id: 'grade_ds'
         		}, [
          			{name: 'YR'},
          			{name: 'SEM'},
					{name: 'DEPTGRPCODE'},
					{name: 'CLASSCODE'},
					{name: 'NAME'},
					{name: 'FULLNAME'}
				]),
		 		// turn off remote sorting for local sorting
         		remoteSort: false
		});
	//----------------------------------------------------------
	//----------------------年級combox---------------------------
	grade_combo = new Ext.form.ComboBox({
						//disabled:true,
						id:'grade_combo',
						fieldLabel: '請選擇年級',
              			name: 'faculty',
              			mode: 'local',
              			store: grade_ds,
              			displayField:'NAME',
              			valueField:'CLASSCODE',
						hiddenName:'CLASSCODE',
              			allowBlank :false,
              			emptyText:'請先選擇年級...',
              			typeAhead: true,
              			triggerAction:'all',
              			editable: false,
						forceSelection: true
				});
	//---------------------------------------------------------
	
	
	
	clear_semester_form_element_button = new Ext.Button({
												id: 'clear_semester_form_element_button',
												text: '清除',
												iconCls:'clear_sem_btn',
												handler: clear_se_f_el
	});
	
	
	function clear_se_f_el(){
		ch_fa_combo.clearValue();
		ch_fa_combo.reset();
		grade_combo.clearValue();
		grade_combo.reset();
	}
			
	
	academic_field.on('blur',ajax_ch_combo);
	semester.on('select',ajax_ch_combo);
	facombo.on('select',ajax_ch_fa_combo);
	depcombo.on('select',ajax_ch_fa_combo);
	ch_fa_combo.on('select',ajax_grade_combo);
	
	depcombo.store.on('beforeload',function(){
							depcombo.store.removeAll();
							depcombo.clearValue();
							depcombo.reset();
					});
	facombo.store.on('beforeload',function(){
							facombo.store.removeAll();
							facombo.clearValue();
							facombo.reset();
					});	
	ch_fa_combo.store.on('beforeload',function(){
							ch_fa_combo.store.removeAll();
							ch_fa_combo.clearValue();
							ch_fa_combo.reset();
					});
	grade_combo.store.on('beforeload',function(){
							grade_combo.store.removeAll();
							grade_combo.clearValue();
							grade_combo.reset();
					});					
	
	function ajax_ch_combo(){
								
		var aca_value = academic_field.getValue();
		var semester_value = semester.getValue();
		if(aca_value != "" && semester_value != ""){
			depcombo.store.reload({params:{aca_v:aca_value,
							  		   	   sem_v:semester_value}});
			facombo.store.reload({params:{aca_v:aca_value,
							 		  	  sem_v:semester_value}});
		}
	}
	
	function ajax_ch_fa_combo(){
		var aca_value = academic_field.getValue();
		var semester_value = semester.getValue();
		var dep_value = depcombo.getValue();
		var fa_value = facombo.getValue();
		
		if(aca_value != "" && semester_value != "" && dep_value != "" && fa_value != ""){
			ch_fa_combo.store.reload({params:{aca_v:aca_value,
								 		  	  sem_v:semester_value,
										  	  dep_v:dep_value,
										  	  fa_v:fa_value}});
			grade_combo.store.removeAll();
			grade_combo.clearValue();
			grade_combo.reset();
		}
	}
	
	function ajax_grade_combo(){
		var aca_value = academic_field.getValue();
		var semester_value = semester.getValue();
		var ch_fa_value = ch_fa_combo.getValue();
		
		if(aca_value != "" && semester_value != "" && ch_fa_value != ""){
			grade_combo.store.reload({params:{aca_v:aca_value,
								 		  	  sem_v:semester_value,
											  ch_fa_v:ch_fa_value}});
		}
	}
					 
});